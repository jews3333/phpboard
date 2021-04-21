<?
    include $_SERVER['DOCUMENT_ROOT']."/db.php";

    $no = $_GET['no'];
    $sql = mq("select * from ts_board where NO='".$no."'");
    $board = $sql -> fetch_array();

?>

<? include $_SERVER['DOCUMENT_ROOT']."/head.php" ?>

<div class="content">
    <form action="" method="post">
        <table class="board-view">
            <caption></caption>
            <colgroup>
                <col style="width:10%;"/>
                <col />
            </colgroup>
            <tbody>
                <tr>
                    <th>패스워드</th>
                    <td>
                        <input type="password" id="password" name="password" class="text"/>
                    </td>
                </tr>
            <tbody>
        </table>
        <div class="btns">
            <button type="submit">작성완료</a>
        </div>
    </form>
</div>

<? include $_SERVER['DOCUMENT_ROOT']."/foot.php" ?>

<?
    $password = $board['PASSWORD'];

    if(isset($_POST['password'])){
        $password_check = $_POST['password'];

        if(password_verify($password_check, $password)){
            $password_check == $password;
?>
            <script>location.href = "./view.php?no=<? echo $board['NO'] ?>";</script>
<? } else { ?>
            <script>alert("패스워드 인증 실패");</script>
<?   
        }
    }
?>