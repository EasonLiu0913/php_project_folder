<?php
session_start();

header("Content-Type: text/html; chartset=utf-8");

require_once('./db.inc.php');

if (isset($_POST['username']) && isset($_POST['pwd'])) {
    $sql = "SELECT `username`, `pwd`
            FROM `admin` 
            WHERE `username` = ?
            AND `pwd` = ?";

    $pdo_stmt = $pdo->prepare($sql);
    $arrParam = [
        $_POST['username'],
        $_POST['pwd']
    ];
    $pdo_stmt->execute($arrParam);

    if ($pdo_stmt->rowCount() > 0) {
        header("Refresh: 1; url=./member_adminv2.php");

        $_SESSION['username'] = $_POST['username'];
        $_SESSION['pwd'] = $_POST['pwd'];
        // echo "<script>alert(登入成功);location.href='member_adminv1.php'</script>";
        echo "Login Successed! 3秒後進入後端頁面";
    } else {
        header("Refresh: 3; url=./member_loginv1.php");
        echo "Login Failed…3秒後自動回登入頁";
    }
} else {
    header("Refresh: 3; url=./member_loginv1.php");
    echo "請確實登入…3秒後自動回登入頁";
}
