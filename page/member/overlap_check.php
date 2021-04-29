<?
    include $_SERVER['DOCUMENT_ROOT']."/db.php";

    $id = $_POST['id'];
    $sql1 = mq("select * from ts_user where id='".$id."'");
    $cnt = $sql1->fetch_array();

    if($cnt == 0){
        $chk = "OK";
    } else {
        $chk = "ERROR";
    }

    echo $chk;
?>