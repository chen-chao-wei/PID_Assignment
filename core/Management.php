<?php
session_start();
include_once 'Database.php';
function getUsersInfo()
{
    $conn = new DB();
    $sqlGetUsers = <<<block
        select userID ,account ,personID ,ban from users ;
        block;
    $result = $conn->select($sqlGetUsers);
    return $result;
}
function setUsersInfo($isBan)
{
    $conn = new DB();
    $sqlGetUsers = <<<block
        select userID ,account ,personID ,ban from users ;
        block;
    $result = $conn->select($sqlGetUsers);
    return $result;
}
function getOrder($userID)
{
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
// function getOrderToLineChart($userID)
// {
//     $conn = new DB();

//     $sqlGetOrder = <<<block
//     SELECT date(o.datatime)as date,c.userID as sellerID,SUM(o.quantity*o.price) as amount
//     FROM 	`order` o 
//     INNER JOIN commodity c
//     ON o.commodityID = c.commodityID
//     where sellerID = $userID
//     GROUP by date(o.datatime),c.userID
//     ORDER BY date(o.datatime) DESC
//     block;
//     $result = $conn->select($sqlGetOrder);
//     return $result;
// }
function getWeekOrderToLineChart($userID)
{   
    $conn = new DB();
    $sqlGetOrder = <<<block
    SELECT date(o.datatime)as date,c.userID as sellerID,SUM(o.quantity*o.price) as amount
    FROM 	`order` o 
    INNER JOIN commodity c
    ON o.commodityID = c.commodityID
    where sellerID = $userID AND DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(o.datatime)
    GROUP by date(o.datatime),c.userID
    ORDER BY date(o.datatime) DESC
    block;    
    
    $result = $conn->select($sqlGetOrder);
    
    return $result;
}
function getMonthOrderToLineChart($userID)
{   
    $conn = new DB();
    $sqlGetOrder = <<<block
    SELECT date(o.datatime)as date,c.userID as sellerID,SUM(o.quantity*o.price) as amount
    FROM 	`order` o 
    INNER JOIN commodity c
    ON o.commodityID = c.commodityID
    where sellerID = 1 AND DATE_FORMAT(o.datatime,'%Y%m')=DATE_FORMAT(CURDATE(),'%Y%m')
    GROUP by date(o.datatime),c.userID
    ORDER BY date(o.datatime) DESC
    block;        
    $result = $conn->select($sqlGetOrder);    
    return $result;
}
function doLineChart($orderData,$day){
    
    for ($i = $day - 1; 0 <= $i; $i--) {
        $date[] = date('Y-m-d', strtotime('-' . $i . ' day'));
        $amount[] = "0";
    }
    array_walk($orderData, function ($value, $key) use ($date, &$amount) {
        $index = array_search($value['date'],$date);
        $amount[$index] = $value['amount'];
        });
    $data=[];
    foreach($date as $key => $item){
        array_push($data,array('date' => $item,'amount' => $amount[$key]));        
    }
    return $data;
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
} else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == "management") {
    $inputBan = $_POST['inputBan'];
    $usersID = $_SESSION['userID'];
    $count = count($inputBan);
    $conn = new DB();
    for ($i = 0; $i < $count; $i++) {
        if ($inputBan[$i] == 1) {
            $sql = "update users set ban ='Y' where userID = {$usersID[$i + 1]}";
        } else {
            $sql = "update users set ban ='N' where userID = {$usersID[$i + 1]}";
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
} else  if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == "getOrder") {
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
} else  if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == "getOrderToLineChart") {        
    $day = $_POST['day'];
    if($day==7){
        $result = getWeekOrderToLineChart($_SESSION['userID']);
    }else{
        $result = getMonthOrderToLineChart($_SESSION['userID']);
    }
    $result = doLineChart($result,$day);    
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
