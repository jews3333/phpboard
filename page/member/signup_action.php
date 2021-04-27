<?
    include $_SERVER['DOCUMENT_ROOT']."/db.php";
  
    $id = $_POST['id'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $name = $_POST['name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $email = $_POST['email1'].'@'.$_POST['email2'];

    $sql1 = mq("select * from ts_user where id='".$id."'");
    $cnt = $sql1->fetch_array();

    if($cnt == 0){
        $sql2 = mq("insert into ts_user (id,password,name,address,gender,email) values('".$id."','".$password."','".$name."','".$address."','".$gender."','".$email."')");
        ?>
            <script>
                alert('회원가입이 완료되었습니다.');
                location.href = "/";
            </script>
        <?
    } else {
        ?>
            <script>
                alert("중복된 아이디입니다.");
                history.back();
            </script>
        <?
    }
?>
