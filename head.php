<? 
    include $_SERVER['DOCUMENT_ROOT']."/db.php";

    session_save_path(session_save_path());
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <title>테스트</title>
        
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/resource/css/base.css"/>
        <link rel="stylesheet" type="text/css" href="/resource/css/layout.css"/>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>
    <body>
        <header id="header">
            <div class="header-inner">
            <?
                if(isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)){
                        session_unset();
                        session_destroy();
                }
                $_SESSION['LAST_ACTIVITY'] = time();

                if(isset($_SESSION['ID'])){
                    ?>
                    <p><? echo $_SESSION['ID'] ?>님 로그인 상태입니다.</p>
                    <div class="header-btns">
                        <a href="/page/member/signout.php">로그아웃</a>
                    </div>
                    <?
                } else {
                    ?>
                    <div class="header-btns">
                        <a href="/page/member/signin.php">로그인</a>
                        <a href="/page/member/signup.php">회원가입</a>
                    </div>
                    <?
                }
            ?>
            </div>
        </header>
        