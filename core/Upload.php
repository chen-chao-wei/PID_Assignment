<?php
try {
    include_once 'Database.php';
    //取得上傳檔案資訊

    if ($_SERVER['REQUEST_METHOD'] == "POST" && $_FILES != null) {
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
        
        //echo ($_REQUEST['userID']);
        //$formData = json_decode(file_get_contents($_REQUEST['formData']), true);
        $conn = new DB();
        $sql = <<<block
        insert into commodity(userID,name,category,quantity,price,description,img) 
        values({$_REQUEST['userID']},'{$_REQUEST['name']}','{$_REQUEST['category']}',
              '{$_REQUEST['quantity']}',{$_REQUEST['price']},'{$_REQUEST['description']}','$file');
        block;
        $conn->insert($sql);
   
        //$sql = sprintf("insert into commodity(userID,name,img) values({$_REQUEST['userID']},'',%s)", "'" . $file . "'");
         echo json_encode(array(
            'sql' => $_REQUEST['description']
        ));
        
        
         
    } else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=="showList") {
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
            foreach($result as $item){
                array_push($commodityID,$item['commodityID']);
                array_push($name,$item['name']);
                array_push($category,$item['category']);
                array_push($quantity,$item['quantity']);
                array_push($price,$item['price']);
                array_push($description,$item['description']);                
                array_push($base64Src,base64_encode($item['img']));
            }
            // foreach()
            // array_push($quantity,$item['quantity']);
            echo json_encode(array(
                'commodityID' => $commodityID,
                'name'        => $name ,
                'category'    => $category ,
                'quantity'    => $quantity ,
                'price'       => $price ,
                'description' => $description ,                
                'src'         => $base64Src
                //'src' => "data:image/jpeg;base64," . base64_encode($result[1]['img'])
            ));
        }
    }else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=="edit") {
        @$userID = $_POST["userID"];
        @$commodityID = $_POST["commodityID"];
        if ($userID != null) {
            $conn        = new DB();
            $commodityID ;
            $name        ;
            $category    ;
            $quantity    ;
            $price       ;
            $description ;
            $quantity    ;
            $base64Src   ;
            $sql = sprintf("select userID,LPAD(commodityID,10,0) as commodityID,name,category,quantity,price,description,img from commodity where userID=$userID &&commodityID=$commodityID");
            $result = $conn->select($sql);
            //var_dump($result);
            foreach($result as $item){
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
                'name'        => $name ,
                'category'    => $category ,
                'quantity'    => $quantity ,
                'price'       => $price ,
                'description' => $description ,                
                'src'         => $base64Src
            ));
        }
    }else{
        echo json_encode(array(
            'msg' => "error"
        ));
    }
    //var_dump($_FILES['image']);
} catch (\Throwable $th) {
    throw $th;
}
