<?php
header("Content-Type: text/html; chartset=utf-8");

//引入判斷是否登入機制
// require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');



//SQL 敘述
$sql = "INSERT INTO `member` 
        (`Account`, `AccountActivated`, `Email`, `Pwd`, `Name`, `Gender`,`Img`,  `Birthday`, `PhoneNumber`, `Address`, `Blocked`, `VIP`, `VIP_Start`, `VIP_Due`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,  ?, ?, ?, ?, ?)";

if ($_FILES["Img"]["error"] === 0) {
    //上傳檔案
    $Img = date("YmdHis");
    $extension = pathinfo($_FILES["Img"]["name"], PATHINFO_EXTENSION);

    //檔案名稱
    $imgFileName = $Img . "." . $extension;

    //若上傳成功，則將上傳檔案從暫存資料夾，移動到指定的資料夾或路徑
    if (!move_uploaded_file($_FILES["Img"]["tmp_name"], "./files/" . $imgFileName)) {
        header("Refresh: 1; url=./member_adminv2.php");
        echo "圖片上傳失敗";
        exit();
    }
}

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();
//繫結用陣列
$arr = [
    $_POST['Account'],
    $_POST['AccountActivated'],
    $_POST['Email'],
    sha1($_POST['Pwd']),
    $_POST['Name'],
    $_POST['Gender'],
    $imgFileName,
    $_POST['Birthday'],
    $_POST['PhoneNumber'],
    $_POST['Address'],
    $_POST['Blocked'],
    $_POST['VIP'],
    $_POST['VIP_Start'],
    $_POST['VIP_Due']
];

$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->execute($arr);
// echo "<pre>";
// print_r($arr);
// echo "</pre>";
// exit();



if ($pdo_stmt->rowCount() > 0) {
    header("Refresh: 1; url=./member_adminv2.php");
    echo "新增成功";
} else {
    header("Refresh: 10; url=./member_adminv2.php");
    echo "新增失敗";
}
