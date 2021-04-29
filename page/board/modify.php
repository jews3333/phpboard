<? include $_SERVER['DOCUMENT_ROOT']."/head.php" ?>

<?
    $no = $_GET['no'];
    $sql = mq("select * from ts_board where NO='".$no."'");
    $board = $sql -> fetch_array();
?>

    <div class="content">
        <form action="modify_action.php?no=<? echo $no; ?>" method="post">
            <table class="board-form">
                <caption></caption>
                <colgroup>
                    <col style="width:10%;"/>
                    <col />
                </colgroup>
                <tbody>
                    <tr>
                        <th>제목</th>
                        <td><input type="text" id="sj" name="sj" class="text" value="<? echo $board['SJ']; ?>"/></td>
                    </tr>
                    <tr>
                        <th>작성자</th>
                        <td><input type="text" id="writer" name="writer" class="text" value="<? echo $board['WRITER']; ?>"/></td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td><textarea id="cn" name="cn"><? echo $board['CN']; ?></textarea></td>
                    </tr>
                <tbody>
            </table>
            <div class="btns">
                <button type="submit">수정완료</a>
            </div>
        </form>
    </div>
    
<? include $_SERVER['DOCUMENT_ROOT']."/foot.php" ?>