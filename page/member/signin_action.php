<?
    include $_SERVER['DOCUMENT_ROOT']."/db.php";

    if($_POST['id'] == "" || $_POST['password'] == ""){
        ?>
        <script>
            alert("아이디나 패스워드를 입력하세요.");
            history.back();
        </script>
        <?
    } else {
        $id = $_POST['id'];
        $password =$_POST['password'];
        $sql = mq("select * from ts_user where id='".$_POST['id']."'");
        $member = $sql->fetch_array();
        $hash_password = $member['password'];

        if(password_verify($password, $hash_password)){
            
            session_start();
            
            $_SESSION['ID'] = $member['id'];
            $_SESSION['PASSWORD'] = $member['password'];
            ?>
                <script>
                    alert("로그인되었습니다.");
                    location.href = '/';
                </script>
            <?
        } else {
            ?>
                <script>
                    alert("아이디나 패스워드를 확인하세요.");
                    history.back();
                </script>
            <?
        }
    }
?>
