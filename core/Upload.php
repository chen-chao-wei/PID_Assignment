<?php
session_start();
include_once 'Database.php';
function imgToBase64($date)
{
    foreach ($date as $key => $item) {
        $date[$key]['img'] = base64_encode($item['img']);
    }
    return $date;
}
//$isImg 判斷是否GET IMAGE
function getCommodity($isImg,$userID,$commodityID)
{
    $conn = new DB();
    if($isImg){
        $sqlGetCommodity = <<<block
        select userID,name ,commodityID,category ,quantity,quantitySold,price,description,img  from commodity ;
        block;
    }else{
        $sqlGetCommodity = <<<block
        select userID,name ,commodityID,category ,quantity,quantitySold,price,description  
        from commodity where userID=$userID and commodityID = $commodityID;
        block;
    }
    
    $result = $conn->select($sqlGetCommodity);
    if($isImg){
        foreach ($result as $key => $item) {
            $result[$key]['img'] = base64_encode($item['img']);
        }
    }
    
    return $result;
}
function setCommodity($userID,$commodityID,$quantitySold){
    $conn = new DB();
    $srcCommodity = getCommodity(false,$userID,$commodityID);
    $dstQommodity = $srcCommodity[0]['quantity']-$quantitySold;
    if($dstQommodity<0 ){
        return false;
    }
    $dstQuantitySold = $srcCommodity[0]['quantitySold'] += $quantitySold;
    $sqlSetCommodity = <<<block
        UPDATE `Commodity` SET quantity = $dstQommodity,quantitySold = $dstQuantitySold
        WHERE userID = $userID and commodityID = $commodityID;
    block;
    $conn->select($sqlSetCommodity);
    return true;
}
function setShopCart($userID, $commodityID, $quantity)
{
    $conn = new DB();
    $commodityInfo = getCommodity(false,$userID,$commodityID);
    $setShopCart = <<<block
        insert into  shopCart (userID,sellerID,commodityID,quantity,price) 
        values($userID,{$commodityInfo[0]['userID']},{$commodityInfo[0]['commodityID']},$quantity,{$commodityInfo[0]['price']});
        block;
    $conn->select($setShopCart);
}
function delShopCart($userID, $commodityID)
{
    $conn = new DB();

    $sqlDelShopCart = <<<block
        DELETE FROM shopCart WHERE userID = $userID && commodityID = $commodityID;
        block;
    $conn->delete($sqlDelShopCart);
}
function getShopCart($userID)
{
    $conn = new DB();
    $sqlGetShopCarty = <<<block
        SELECT LPAD(s.userID,10,0)as userID,LPAD(s.sellerID,10,0)as sellerID,
        LPAD(s.commodityID,10,0)as commodityID,c.name,SUM(s.quantity)as quantity,s.price,c.img 
        FROM shopcart s 
        INNER JOIN commodity c
        ON c.commodityID = s.commodityID 
        WHERE s.userID = $userID and s.quantity>0
        GROUP BY s.userID,s.sellerID,s.commodityID,s.price;
        block;
    $result = $conn->select($sqlGetShopCarty);
    $result = imgToBase64($result);
    return $result;
}
function setUserDetail()
{
    $conn = new DB();

    $sqlSetUserDetail = <<<block
        insert into  `userDetail` (userID,orderID,commodityID,quantity,price) 
        values
        block;
    $conn->insert($sqlSetUserDetail);
}
function setInventory($userID,$commodityID,$quantity,$quantitySold)
{
    $conn = new DB();
    $quantity -= $quantitySold;
    $sqlSetInventory = <<<block
        UPDATE `Inventory` SET userID = $userID, commodityID = $commodityID,
                               quantity = $quantity,quantitySold = $quantitySold
        WHERE userID = $userID, commodityID = $commodityID;
        block;
    $conn->update($sqlSetInventory);
}
function setOrder($userID, $commodityID)
{
    $conn = new DB();
    $shopCart = getShopCart($userID);

    $sqlGetPreOrderID = <<<block
        SELECT orderID FROM `order`  ORDER BY orderID DESC LIMIT 0 , 1
        block;   
    $preOrderID = $conn->select($sqlGetPreOrderID); 
    ($preOrderID==null)?$preOrderID=0:$preOrderID=$preOrderID[0]['orderID']; 
    $orderID = $preOrderID+1;  
    $sqlSetOrder = <<<block
        insert into  `order` (orderID,userID,sellerID,commodityID,quantity,price) 
        values
        block;
    $shopCartIdx = null;
    $orderID = $preOrderID+1;
    foreach ($commodityID as $key => $item) {
        foreach ($shopCart as $key2 => $item2) {
            if ($item2['commodityID'] == $item) {
                $shopCartIdx = $key2;
                break;
            }
        }
        $sellerID = $shopCart[$shopCartIdx]['sellerID'];
        $quantity = $shopCart[$shopCartIdx]['quantity'];
        $price = $shopCart[$shopCartIdx]['price'];
        $sqlSetOrder .= "($orderID,$userID,$sellerID,$item,$quantity,$price),";
        
        if(setCommodity($userID,$item,$quantity)){
            delShopCart($userID,$item);
        }else{
            delShopCart($userID,$item);
            return "抱歉，目前存貨不足。";
        }
        
    }
    $sqlSetOrder = substr($sqlSetOrder, 0, -1);
    $sqlSetOrder .= ";";
    $conn->select($sqlSetOrder);
    return true;
    
}
try {

    //取得上傳檔案資訊
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $result = getCommodity(true,"","");
        if ($result) {
            echo json_encode(array(
                'commodityData' => $result
            ));
        } else {
            echo json_encode(array(
                'errorMsg' => "ERROR"
            ));
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['action'] == "upload" || $_REQUEST['action'] == "edit") {
        if ($_FILES != null) {
            $filename = $_FILES['image']['name'];
            $tmpname = $_FILES['image']['tmp_name'];
            $filetype = $_FILES['image']['type'];
            $filesize = $_FILES['image']['size'];
            $file = NULL;

            if (isset($_FILES['image']['error'])) {
                if ($_FILES['image']['error'] == 0) {
                    $instr = fopen($tmpname, "rb");
                    $file = addslashes(fread($instr, filesize($tmpname)));
                }
            }
        }

        //echo ($_REQUEST['userID']);
        //$formData = json_decode(file_get_contents($_REQUEST['formData']), true);
        $conn = new DB();
        if ($_REQUEST['action'] == "upload" && $_FILES != null) {
            $sql = <<<block
            insert into commodity(userID,name,category,quantity,quantitySold,price,description,img) 
            values({$_REQUEST['userID']},'{$_REQUEST['name']}','{$_REQUEST['category']}',
                {$_REQUEST['quantity']},0,{$_REQUEST['price']},'{$_REQUEST['description']}','$file');
            block;

            $conn->insert($sql);
            echo json_encode(array(
                'sql' => "OK"
            ));
        } else if ($_REQUEST['action'] == "edit") {
            if ($_FILES != null) {
                $sql = <<<block
                update commodity set name ='{$_REQUEST['name']}',category = '{$_REQUEST['category']}',
                    quantity = {$_REQUEST['quantity']},price = {$_REQUEST['price']},
                    description = '{$_REQUEST['description']}',img = '$file' 
                where userID = {$_REQUEST['userID']} && commodityID={$_REQUEST['commodityID']};                
                block;
            } else {
                $sql = <<<block
                update commodity set name ='{$_REQUEST['name']}',category = '{$_REQUEST['category']}',
                    quantity = {$_REQUEST['quantity']},price = {$_REQUEST['price']},
                    description = '{$_REQUEST['description']}' 
                where userID = {$_REQUEST['userID']} && commodityID={$_REQUEST['commodityID']};                
                block;
            }

            $conn->update($sql);
            echo json_encode(array(
                'sql' => $_REQUEST['commodityID']
            ));
        }
    } else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == "showList") {
        @$userID = $_POST["userID"];
        if ($userID != null) {
            $conn        = new DB();
            $commodityID = array();
            $name        = array();
            $category    = array();
            $quantity    = array();
            $price       = array();
            $description = array();
            $quantity = array();
            $base64Src   = array();
            $sql = sprintf("select userID,LPAD(commodityID,10,0) as commodityID,name,category,quantity,price,description,img from commodity where userID=$userID");
            $result = $conn->select($sql);
            //var_dump($result);
            foreach ($result as $item) {
                array_push($commodityID, $item['commodityID']);
                array_push($name, $item['name']);
                array_push($category, $item['category']);
                array_push($quantity, $item['quantity']);
                array_push($price, $item['price']);
                array_push($description, $item['description']);
                array_push($base64Src, base64_encode($item['img']));
            }
            // foreach()
            // array_push($quantity,$item['quantity']);
            echo json_encode(array(
                'commodityID' => $commodityID,
                'name'        => $name,
                'category'    => $category,
                'quantity'    => $quantity,
                'price'       => $price,
                'description' => $description,
                'src'         => $base64Src
                //'src' => "data:image/jpeg;base64," . base64_encode($result[1]['img'])
            ));
        }
    } else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['action'] == "insertForm") {
        @$userID = $_POST["userID"];
        @$commodityID = $_POST["commodityID"];
        if ($userID != null) {
            $conn        = new DB();
            $commodityID;
            $name;
            $category;
            $quantity;
            $price;
            $description;
            $quantity;
            $base64Src;
            $sql = sprintf("select userID,LPAD(commodityID,10,0) as commodityID,name,category,quantity,price,description,img from commodity where userID=$userID &&commodityID=$commodityID");
            $result = $conn->select($sql);
            //var_dump($result);
            foreach ($result as $item) {
                $commodityID = $item['commodityID'];
                $name = $item['name'];
                $category = $item['category'];
                $quantity = $item['quantity'];
                $price = $item['price'];
                $description = $item['description'];
                $base64Src = base64_encode($item['img']);

                // array_push($category,$item['category']);
                // array_push($quantity,$item['quantity']);
                // array_push($price,$item['price']);
                // array_push($description,$item['description']);                
                // array_push($base64Src,base64_encode($item['img']));
            }
            // foreach()
            // array_push($quantity,$item['quantity']);
            echo json_encode(array(
                'commodityID' => $commodityID,
                'name'        => $name,
                'category'    => $category,
                'quantity'    => $quantity,
                'price'       => $price,
                'description' => $description,
                'src'         => $base64Src
            ));
        }
    } else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == "addToShopCart") {
        if ($_POST['quantity'] < 0) {
            echo json_encode(array(
                'errorMsg' =>  "商品數量錯誤"
            ));
            return;
        }
        $sUserID = $_SESSION['userID'];
        setShopCart($sUserID, $_POST['commodityID'], $_POST['quantity']);
        echo json_encode(array(
            'successMsg' => "OK"
        ));
    } else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == "checkShopCart") {

        $result = getShopCart($_POST['userID']);
        if ($result) {
            echo json_encode(array(
                'shopCartList' =>  $result
            ));
        } else {
            echo json_encode(array(
                'errorMsg' => "ERROR"
            ));
        }
    } else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == "buy") {

        // if($_POST['quantity']<0){
        //     echo json_encode(array(
        //         'errorMsg' =>  "商品數量錯誤"
        //     ));
        //     return ;
        // }
        $result = setOrder($_POST['userID'], $_POST['commodityID']);
        if($result===true){
            echo json_encode(array(
                'successMsg' => "OK"
            ));
        }else{
            echo json_encode(array(
                'errorMsg' => $result
            ));
        }
        
    } else {
        echo json_encode(array(
            'msg' => "error"
        ));
    }

    //var_dump($_FILES['image']);
} catch (\Throwable $th) {
    throw $th;
}
