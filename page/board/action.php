<?
    include $_SERVER['DOCUMENT_ROOT']."/db.php";

    $writer = $_POST['writer'];
    $title = $_POST['sj'];
    $content = $_POST['cn'];
    $create_date = date('Y-m-d H:i:s');

    if($writer && $title && $content){
        $sql = mq("insert into ts_board(SJ,CN,WRITER,CREATE_DATE,USE_YN) values('".$title."','".$content."','".$writer."','".$create_date."','Y',)");
        echo "<script> alert('글쓰기 완료'); location.href = '/'; </script>";
    } else {
        echo "<script> alert('글쓰기 실패'); history.back(); </script>";
    }
?>