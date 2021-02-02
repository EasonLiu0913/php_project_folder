<?php
require_once('./db.inc.php');
//單圖
$sql = "DELETE FROM `items` WHERE `itemId` = ? ";

$sqlGetImg = "SELECT `itemImg` FROM `items` WHERE `itemId` = ? ";
$stmtGetImg = $pdo->prepare($sqlGetImg);

for( $i = 0; $i < count($_POST['chk']); $i++ ){
    $arrGetImgParam = [
        (int)$_POST['chk'][$i]
    ];

    $stmtGetImg->execute($arrGetImgParam);

    if($stmtGetImg->rowCount() > 0){
        $arrImg = $stmtGetImg->fetchAll(PDO::FETCH_ASSOC)[0];
        if( $arrImg['itemImg'] !== NULL ){
            @unlink("./images/".$arrImg['itemImg']);
        }
    }

    $arrParam = [
        (int)$_POST['chk'][$i]
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);

}

//多圖
for($i = 0; $i < count($_POST['chk']); $i++){
    $arrParam = [
        $_POST['chk'][$i]
    ];

$sqlImg = "SELECT `multipleImageImg` FROM `multiple_images` WHERE `itemId` = ? ";
$stmt_img = $pdo->prepare($sqlImg);
$stmt_img->execute($arrParam);

    if($stmt_img->rowCount() > 0) {
        //取得檔案資料 (單筆)
        $arr = $stmt_img->fetchAll(PDO::FETCH_ASSOC);

        for( $k = 0 ; $k <count($arr) ;$k++){
            if(file_exists("./images/".$arr[$k]['multipleImageImg'])){
                unlink("./images/".$arr[$k]['multipleImageImg']);
            }
        
            $sql1 = "DELETE FROM `multiple_images` WHERE `itemId` = ? ";
                    $stmt = $pdo->prepare($sql1);
                    $stmt->execute($arrParam);
        }
        
    }
    
}
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

    header("Refresh: 1; url=./productlist.php");
    echo "刪除成功";