<?php
require_once('./vendor/autoload.php');

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// $spreadsheet = new Spreadsheet();
// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');
// $writer = new Xlsx($spreadsheet);
// $writer->save('hello world.xlsx');
// $cellValue = $spreadsheet->getActiveSheet()->getCell('A1')->getValue();
// echo $cellValue;

$inputFileName = './all.xls';
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
$highestRow = $spreadsheet->getActiveSheet()->getHighestRow();

require_once('./db.inc.php');

for ($i = 2; $i <= $highestRow; $i++) {
    //若是某欄位值為空，代表那一列可能都沒資料，便跳出迴圈
    if ($spreadsheet->getActiveSheet()->getCell('A' . $i)->getValue() === '' || $spreadsheet->getActiveSheet()->getCell('A' . $i)->getValue() === null) break;

    $ID = $spreadsheet->getActiveSheet()->getCell('A' . $i)->getValue();
    $Account = $spreadsheet->getActiveSheet()->getCell('B' . $i)->getValue();
    $AccountActivated = $spreadsheet->getActiveSheet()->getCell('C' . $i)->getValue();
    $Email = $spreadsheet->getActiveSheet()->getCell('D' . $i)->getValue();
    $Pwd = $spreadsheet->getActiveSheet()->getCell('E' . $i)->getValue();
    $Pwd = sha1($Pwd);
    $Name = $spreadsheet->getActiveSheet()->getCell('F' . $i)->getValue();
    $Gender = $spreadsheet->getActiveSheet()->getCell('G' . $i)->getValue();
    $Img = $spreadsheet->getActiveSheet()->getCell('H' . $i)->getValue();
    $Birthday = $spreadsheet->getActiveSheet()->getCell('I' . $i)->getFormattedValue();
    $PhoneNumber = $spreadsheet->getActiveSheet()->getCell('J' . $i)->getValue();
    $Address = $spreadsheet->getActiveSheet()->getCell('K' . $i)->getValue();
    $Blocked = $spreadsheet->getActiveSheet()->getCell('L' . $i)->getValue();
    $VIP =   $spreadsheet->getActiveSheet()->getCell('M' . $i)->getValue();
    $VIP_Start = $spreadsheet->getActiveSheet()->getCell('N' . $i)->getFormattedValue();
    $VIP_Due = $spreadsheet->getActiveSheet()->getCell('O' . $i)->getFormattedValue();

    // echo "[".$i."] ".$." ".$courseName."\n";

    $sql = "INSERT INTO `member` (
        `ID`, `Account`, `Email`, `Pwd`, `AccountActivated`, `Name`, `Gender`, `Img`, `Birthday`, `PhoneNumber`, `Address`, `Blocked`, `VIP`, `VIP_Start`, `VIP_Due`
        ) values (
            ?,?,?,?,?,
            ?,?,?,?,?,
            ?,?,?,?,?

        )";
    $stmt = $pdo->prepare($sql);
    $arrParam = [
        (int) $ID,
        (string) $Account,
        (int) $AccountActivated,
        (string) $Email,
        (string) $Pwd,
        (string) $Name,
        (string) $Gender,
        (string) $Img,
        (string) $Birthday,
        (string) $PhoneNumber,
        (string) $Address,
        (string) $Blocked,
        (string) $VIP,
        (string) $VIP_Start,
        (string) $VIP_Due
    ];

    $stmt->execute($arrParam);
    if ($stmt->rowCount() > 0) {
        echo $pdo->lastInsertId();
    }
}
