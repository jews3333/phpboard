<?
    include $_SERVER['DOCUMENT_ROOT']."/db.php";

    $no = $_GET['no'];

    $hit = mysqli_fetch_array(mq("select * from ts_board where NO='".$no."'"));
    $hit = $hit['HIT'] + 1;
    $fet = mq("update ts_board set HIT='".$hit."' where NO='".$no."'");

    $sql = mq("select * from ts_board where NO='".$no."'");
    $board = $sql -> fetch_array();
?>

<? include $_SERVER['DOCUMENT_ROOT']."/head.php" ?>

<div class="content">
    <table class="board-view">
        <caption></caption>
        <colgroup>
            <col style="width:10%;"/>
            <col />
            <col style="width:10%;"/>
            <col />
            <col style="width:10%;"/>
            <col />
        </colgroup>
        <thead>
        <tbody>
            <tr>
                <th>제목</th>
                <td colspan="5"><? echo $board['SJ']; ?></td>
            </tr>
            <tr>
                <th>작성자</th>
                <td><? echo $board['WRITER']; ?></td>
                <th>작성일</th>
                <td><? echo date('Y-m-d', strtotime($board['CREATE_DATE'])); ?></td>
                <th>조회수</th>
                <td><? echo $board['HIT']; ?></td>
            </tr>
            <tr>
                <th>내용</th>
                <td colspan="5"><? echo nl2br("$board[CN]"); ?></td>
            </tr>
            <tr>
                <th>첨부파일</th>
                <td colspan="5"><a href="../../upload/<?php echo $board['FILE'];?>" download title="다운로드 받기"><?php echo $board['FILE']; ?></td>
            </tr>
        <tbody>
    </table>
    <div class="btns">
        <a href="./delete_action.php?no=<? echo $no; ?>">삭제</a>
        <a href="./modify.php?no=<? echo $no; ?>">수정</a>
        <a href="/">목록</a>
    </div>
</div>

<? include $_SERVER['DOCUMENT_ROOT']."/foot.php" ?>