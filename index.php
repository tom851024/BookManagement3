<?php require_once("class/database.php"); ?>
<?php 

setcookie("isbn", "");
setcookie("comp", "");
setcookie("book", "");
setcookie("aut", "");
setcookie("price", "");
setcookie("date", "");
$ss = new Database();

if(isset($_GET["order"]) && isset($_GET["sc"])){
    $result = $ss->MySelect($_GET["order"], $_GET["sc"]);
    $outputUrl = "Output.php?order=" . $_GET["order"] . "&sc=" . $_GET["sc"];
}else{
    $result = $ss->MySelect();
    $outputUrl = "Output.php";
}
include("xhtml/index.html");

?>