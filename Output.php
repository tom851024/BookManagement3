<?php require_once("class/database.php"); ?>
<?php 



//設定系統環境
set_time_limit(0);
ini_set('memory_limit', '256M');

//匯出陣列
$csv_arr = array();
//csv標頭資料
$csv_arr[] = array('ISBN', '出版社', '書名', '作者', '定價', '發行日');
$s = new Database();
if(isset($_GET["order"]) && isset($_GET["sc"])){
    $result = $s->MySelect($_GET["order"], $_GET["sc"]);
}else{
    $result = $s->MySelect();
}
foreach($result as $res){
    array_push($csv_arr, array($res["ISBN"], $res["Comp"], $res["Book"], $res["Author"], $res["Price"], $res["Date"]));
}
date_default_timezone_set('Asia/Taipei'); //設定時區
$filename = date("Y-m-d-H-i-s") . ".csv"; //檔案名稱
header('Pragma: no-cache');
header('Expires: 0');
header('Content-Disposition: attachment;filename="' . $filename . '";');
header('Content-Type: application/csv; charset=UTF-8');

for($i = 0; $i < count($csv_arr); $i++){
    if($i == 0){
        echo "\xEF\xBB\xBF";
        //輸出避免Excel讀取時亂碼
    }
    echo join(',', $csv_arr[$i]) . PHP_EOL;
}

exit;

?>