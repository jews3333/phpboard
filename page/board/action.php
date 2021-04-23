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

    $temp = $_FILES['file']['tmp_name'];
    $origin = $_FILES['file']['name'];
    $filename = iconv("UTF-8","EUC-KR",$_FILES['file']['name']);
    $forder = "../../upload/".$filename;
    move_uploaded_file($temp, $forder);

    //$mqq = mq("alter table ts_board auto_increment=1");

    if($writer && $title && $content && $password){
        $query = "insert into ts_board(SJ,CN,WRITER,CREATE_DATE,PASSWORD,LOCK_YN,FILE) values('".$title."','".$content."','".$writer."','".$create_date."','".$password ."','".$lock."','".$origin."')";
        $sql = mq($query);
        echo "<script> alert('글쓰기 성공'); location.href = '/'; </script>";
    } else {
        echo "<script> alert('글쓰기 실패'); history.back(); </script>";
    }
?>