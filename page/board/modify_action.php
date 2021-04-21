<?
    include $_SERVER['DOCUMENT_ROOT']."/db.php";

    $no = $_GET['no'];
    $writer = $_POST['writer'];
    $title = $_POST['sj'];
    $content = $_POST['cn'];

    if($writer && $title && $content){
        $query = "update ts_board set SJ='".$title."',CN='".$content."',WRITER='".$writer."' where NO='".$no."'";
        $sql = mq($query);
        echo "<script> alert('수정 완료'); location.href = './view.php?no=".$no."'; </script>";
    } else {
        echo "<script> alert('수정 실패'); history.back(); </script>";
    }
?>