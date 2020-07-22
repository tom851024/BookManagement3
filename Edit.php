<?php require_once("class/database.php"); ?>
<? 

$edit = new Database();

if(isset($_POST["comp"]) && isset($_POST["book"]) && isset($_POST["aut"]) && isset($_POST["price"]) && isset($_POST["date"]) && $_POST["id"]){ //更新資料
    if(preg_match('/^(0|[1-9][0-9]*)$/', $_POST["price"])){
        if(preg_match("/^[0-9]{4}-(0([1-9]{1})|(1[0-2]))-(([0-2]([0-9]{1}))|(3[0|1]))$/", $_POST["date"])){

            if(strpos($_POST["aut"],',') !== false || strpos($_POST["book"],',') !== false || strpos($_POST["comp"],',') !== false){
                header('Location: Edit.php?sign=1&id='.$_POST["id"]);
            }else{
                $editArr = array(
                    "Comp"=>addslashes($_POST["comp"]), 
                    "Book"=>addslashes($_POST["book"]),
                    "Author"=>addslashes($_POST["aut"]), 
                    "Price"=>$_POST["price"], 
                    "Date"=>$_POST["date"]);

                $edit->Update($editArr,  $_POST["id"]);

                if(isset($_GET["order"]) && isset($_GET["sc"])){
                    header('Location: index.php?order='.$_GET["order"].'&sc='.$_GET["sc"]);
                }else{
                    header('Location: index.php'); 
                }
            }
        }else{
            header('Location: Edit.php?date=1&id='.$_POST["id"]);
        }
    }else{
        header('Location: Edit.php?price=1&id='.$_POST["id"]);
    }
    
}else{ //拿取要更新的資料
    $result = $edit->Select($_GET["id"]);
 
    $res = $result->fetch_row();
    $isbn = $res[1];
    $comp = $res[2];
    $book = $res[3];
    $aut = $res[4];
    $price = $res[5];
    $date = $res[6];

    //將雙引號替換 編輯顯示才不會有問題
    $comp = str_replace("\"", "&quot;", $comp);
    $aut = str_replace("\"", "&quot;", $aut);
    $book = str_replace("\"", "&quot;", $book);

    if(isset($_GET["order"]) && isset($_GET["sc"])){
        $postUrl = "Edit.php?order=".$_GET["order"]."&sc=".$_GET["sc"];
    }else{
        $postUrl = "Edit.php";
    }
    include("xhtml/Edit.html");
}




?>