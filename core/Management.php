<?php
session_start();
include_once 'Database.php';
function getUsersInfo(){
    $conn = new DB();
    $sqlGetUsers = <<<block
        select userID ,account ,personID ,ban from users ;
        block;
    $result = $conn->select($sqlGetUsers);
    return $result;
}
function setUsersInfo($isBan){
    $conn = new DB();
    $sqlGetUsers = <<<block
        select userID ,account ,personID ,ban from users ;
        block;
    $result = $conn->select($sqlGetUsers);
    return $result;
}
function getOrder($userID){
    $conn = new DB();
    
    $sqlGetOrder = <<<block
        SELECT o.orderID,o.datatime,c.userID as sellerID,o.commodityID,c.name ,o.quantity,o.price,o.quantity*o.price as amount
        FROM 	`order` o 
        INNER JOIN commodity c
        ON o.commodityID = c.commodityID
        where o.userID = $userID
        GROUP by o.orderID,o.datatime,o.commodityID,c.name ,o.quantity,o.price
        ORDER BY o.datatime DESC;
    block;
    $result = $conn->select($sqlGetOrder);
    return $result;
}
function getOrderToLineChart($userID){
    $conn = new DB();
    
    $sqlGetOrder = <<<block
    SELECT date(o.datatime)as date,c.userID as sellerID,SUM(o.quantity*o.price) as amount
    FROM 	`order` o 
    INNER JOIN commodity c
    ON o.commodityID = c.commodityID
    where sellerID = $userID
    GROUP by date(o.datatime)
    ORDER BY o.datatime DESC
    block;
    $result = $conn->select($sqlGetOrder);
    return $result;
}
header('Content-Type: application/json; charset=UTF-8');
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $result = getUsersInfo();
    if ($result) {       
        echo json_encode(array(
            'users' => $result
        ));
    } else {
        echo json_encode(array(
            'errorMsg' => "查詢失敗,ERROR CODE:2"
        ));
    }
}else if($_SERVER['REQUEST_METHOD'] == "POST"&& $_POST['action']=="management") {    
    $inputBan = $_POST['inputBan'];
    $usersID = $_SESSION['userID'];
    $count = count($inputBan);
    $conn = new DB();
    for($i=0;$i<$count;$i++){
        if($inputBan[$i]==1){
            $sql = "update users set ban ='Y' where userID = {$usersID[$i+1]}";
        }else{
            $sql = "update users set ban ='N' where userID = {$usersID[$i+1]}";
        }
        $conn->update($sql);
    }
    $result = getUsersInfo();
    if ($result) {       
        echo json_encode(array(
            'users' => $result
        ));
    } else {
        echo json_encode(array(
            'errorMsg' => "查詢失敗,ERROR CODE:2"
        ));
    }        
}else  if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=="getOrder") {    
    $result = getOrder($_POST['userID']);
    if ($result) {       
        echo json_encode(array(
            'detail' => $result
        ));
    } else {
        echo json_encode(array(
            'errorMsg' => "查詢失敗,ERROR CODE:2"
        ));
    }        
}else  if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=="getOrderToLineChart") {    
    $result = getOrderToLineChart($_SESSION['userID']);
    // foreach($result as $key => $item){
    //     $result[$key]['date'] = substr($item['date'],0,10);
    // }
    if ($result) {         
        echo json_encode(array(
            'order' => $result
        ));
    } else {
        echo json_encode(array(
            'errorMsg' => "查詢失敗,ERROR CODE:2"
        ));
    }        
}

?>