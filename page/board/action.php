<?
    include $_SERVER['DOCUMENT_ROOT']."/db.php";

    $writer = $_POST['writer'];
    $title = $_POST['sj'];
    $content = $_POST['cn'];
    $create_date = date('Y-m-d H:i:s');
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if(isset($_POST['lock'])){
        $lock = 'Y';
    } else {
        $lock = 'N';
    }

    if($writer && $title && $content && $password){
        $query = "insert into ts_board(SJ,CN,WRITER,CREATE_DATE,PASSWORD,LOCK_YN) values('".$title."','".$content."','".$writer."','".$create_date."','".$password ."','".$lock."')";
        $sql = mq($query);
        echo "<script> alert('글쓰기 성공'); location.href = '/'; </script>";
    } else {
        echo "<script> alert('글쓰기 실패'); history.back(); </script>";
    }
?>