<?php require_once("class/database.php"); ?>
<? 

$del = new Database();
if(isset($_GET["id"]) && preg_match("/^[0-9]+$/", $_GET["id"])){
    $del->Delete($_GET["id"]);
}else{
    echo "錯誤";
}

if(isset($_GET["order"]) && isset($_GET["sc"])){
    header('Location: index.php?order='.$_GET["order"].'&sc='.$_GET["sc"]);
}else{
    header('Location: index.php'); 
}
?>