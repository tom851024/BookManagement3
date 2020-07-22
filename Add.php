<?php require_once("class/database.php"); ?>
<? 


if(isset($_COOKIE["isbn"])){
    $isbn = $_COOKIE["isbn"];
}else{$isbn = "";}

if(isset($_COOKIE["comp"])){
    $comp = $_COOKIE["comp"];
}else{$comp = "";}

if(isset($_COOKIE["book"])){
    $book = $_COOKIE["book"];
}else{$book = "";}

if(isset($_COOKIE["aut"])){
    $aut = $_COOKIE["aut"];
}else{$aut = "";}

if(isset($_COOKIE["price"])){
    $price = $_COOKIE["price"];
}else{$price = "";}

if(isset($_COOKIE["date"])){
    $date = $_COOKIE["date"];
}else{$date = "";}

include("xhtml/Add.html");
$boo = true;

if(isset($_POST["Isbn"]) && isset($_POST["comp"]) && isset($_POST["book"]) && isset($_POST["aut"]) && isset($_POST["price"]) && isset($_POST["date"])){
    if(preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{1}$/', $_POST["Isbn"])){
        if(preg_match('/^(0|[1-9][0-9]*)$/', $_POST["price"])){
            if(preg_match("/^[0-9]{4}-(0([1-9]{1})|(1[0-2]))-(([0-2]([0-9]{1}))|(3[0|1]))$/", $_POST["date"])){

                if(strpos($_POST["aut"],',') !== false || strpos($_POST["book"],',') !== false || strpos($_POST["comp"],',') !== false){
                    $boo = false;
                    header('Location: Add.php?sign=1');
                }else{
                    $dataArr = array(
                        "ISBN"=>$_POST["Isbn"], 
                        "Comp"=>addslashes($_POST["comp"]), 
                        "Book"=>addslashes($_POST["book"]), 
                        "Author"=>addslashes($_POST["aut"]),
                        "Price"=>$_POST["price"],
                        "Date"=>$_POST["date"]);

                    $insert = new Database();
                    $insert->Add($dataArr);
                    header('Location: index.php');     
                }
            }else{
                 $boo = false;
                 header('Location: Add.php?date=1');
            }
        }else{
             $boo = false;
             header('Location: Add.php?price=1');
        }
    }else{
        $boo = false;
        header('Location: Add.php?isbn=1');
    }

    if(!$boo){
         //將雙引號替換 編輯顯示才不會有問題
         $comp = str_replace("\"", "&quot;", $_POST["comp"]);
         $aut = str_replace("\"", "&quot;",$_POST["aut"]);
         $book = str_replace("\"", "&quot;",  $_POST["book"]);
         setcookie("isbn", $_POST["Isbn"]);
         setcookie("comp", $comp);
         setcookie("book", $book);
         setcookie("aut", $aut);
         setcookie("price", $_POST["price"]);
         setcookie("date", $_POST["date"]);
    }

   
}
   
?>