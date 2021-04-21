<?
    header("Content-Type: application/json");

    include $_SERVER['DOCUMENT_ROOT']."/db.php";

    $no = $_POST['no'];
    $sql = mq("select * from ts_board where NO='".$no."'");
    $board = $sql -> fetch_array();
    $password = $board['PASSWORD'];

    if(isset($_POST['password'])){
        $password_check = $_POST['password'];

        if(password_verify($password_check, $password)){
            echo(json_encode(array("check" => true)));
        } else {
            echo(json_encode(array("check" => false)));
        }
    }
?>