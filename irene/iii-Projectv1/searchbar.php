<?php

require_once('./db.inc.php');
$sqlsearch = "SELECT * FROM `member` WHERE `Account` LIKE '%?%'";
$stmtGet = $pdo->prepare($sqlsearch);
$arrGet = [
    (string) $_POST['search']
];
$stmtGet->execute($arrGet);

if (isset($_POST['search'])) {
    // $result = mysqli_query($con, $sqlsearch);
    echo "找到資料";
    $arrGet = $stmtGet->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "沒有資料!";
}
