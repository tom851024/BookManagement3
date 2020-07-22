<?

class Database{

    public $conn;

    function __construct(){ //連線設定
        $serve = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "BookDb";
    
        $conn = new Mysqli($serve, $username, $password, $dbname);
        if($conn->connect_error){
            die('connect error: ' . $conn->connect_error);
        }
        mysqli_query($conn,"SET CHARACTER SET UTF8");
        $this->conn = $conn;
    }



    function MySelect($order="", $sc=""){ //拿取資料
        if(empty($order) || empty($sc)){
            $sqlSelect = "select * from BookList";
        }else{
            $sqlSelect = "select * from BookList order by " . $order . " " . $sc;
        }
        $result = $this->conn->query($sqlSelect);
        return $result;
    }


    function Select($id){ //select出單筆資料
        $sqlselect = "Select * from BookList where id='" . $id . "'";
        $result = $this->conn->query($sqlselect);
        
        return $result;
    }




    function Add($addArr){ //插入功能
        $key = implode(",", array_keys($addArr));
        foreach($addArr as $k => $v){
            $addArr[$k] = "'" . $v . "'";
        }
        $value = implode(",", $addArr);
        $sqlInsert = "Insert into BookList (". $key . ") values (". $value .")";
        $this->conn->query($sqlInsert);   
    }



    function Delete($id){ //刪除功能
        $sqlDel = "Delete from BookList where id='" . $id . "'";
        $this->conn->query($sqlDel);
    }


    function Update($editArr, $id){ //修改功能  
        $upArr = array();
        foreach($editArr as $k => $v){
            $str = $k . "='" . $v . "'";
            array_push($upArr, $str);
        }
        $up = implode(",", $upArr);
        $sqlUpdate = "Update BookList set " . $up . " where id='$id'";
        $this->conn->query($sqlUpdate);
    }



}


?>