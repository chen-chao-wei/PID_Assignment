<?php
try {
    include_once 'Database.php';    
    //取得上傳檔案資訊
    $filename=$_FILES['image']['name'];
    $tmpname=$_FILES['image']['tmp_name'];
    $filetype=$_FILES['image']['type'];
    $filesize=$_FILES['image']['size'];    
    $file=NULL;
    
    if(isset($_FILES['image']['error'])){    
        if($_FILES['image']['error']==0){                                    
            $instr = fopen($tmpname,"rb" );
            $file = addslashes(fread($instr,filesize($tmpname)));        
        }
    }
    
    //新增圖片到資料庫
    $conn = new DB();                    
    $sql=sprintf("insert into commodity(img)values(%s)","'".$file."'");
    $conn->insert($sql);
} catch (\Throwable $th) {
    throw $th;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    sdfsd
</body>
</html>
