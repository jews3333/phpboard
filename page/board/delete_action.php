<?
    include $_SERVER['DOCUMENT_ROOT']."/db.php";

    $no = $_GET['no'];
    $query = "delete from ts_board where NO='".$no."'";
    $sql = mq($query);
?>

<script>
    alert("삭제되었습니다.");
    location.href = "/";
</script>
