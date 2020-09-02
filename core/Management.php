<?php

include_once 'Database.php';
function getUsersInfo(){
    $conn = new DB();
    $sqlGetUsers = <<<block
        select userID ,account ,personID ,ban from users ;
        block;
    $users = $conn->select($sqlGetUsers);
    return $users;
}
function setUsersInfo($isBan){
    $conn = new DB();
    $sqlGetUsers = <<<block
        select userID ,account ,personID ,ban from users ;
        block;
    $users = $conn->select($sqlGetUsers);
    return $users;
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
}else if($_SERVER['REQUEST_METHOD'] == "POST") {    
    $inputBan = $_POST['inputBan'];
    $usersID = $_POST['usersID'];
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
    // if (setUsersInfo($test)) {       
    //     echo json_encode(array(
    //         'users' => $result
    //     ));
    // }
}

?>