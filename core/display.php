<?php
    include_once 'Database.php';    
    //從資料庫取得圖片
    $conn = new DB();
    $sql = sprintf("select * from commodity ");
    $result = $conn->select($sql);
    //header("Content-type: image/jpeg");     
    //print $result['img'];
    var_dump($result['img'][0]);
    // //顯示圖片
    // if($row=mysql_fetch_assoc($result)){    
    //     header("Content-type: image/jpeg");     
    //     print $row['image'];
    // }
    
    
?>