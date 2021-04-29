<?
    session_start();
    header('Content-Type: image/gif');

    $captcha = '';

    $pattern = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    for($i=0, $len = strlen($pattern)-1; $i <6; $i++){
        $captcha .= $pattern[rand(0, $len)];
    }

    $_SESSION['captcha'] = $captcha;

    $img = imagecreatetruecolor(80, 30);
    imagefilledrectangle($img, 0, 0, 100, 100, 0xc80000);
    imagestring($img, 10, 14, 7, $captcha, 0xffffff);
    imageline($img, 0, rand() % 30, 100, rand() % 30, 0x001458);
    imagegif($img);
    imagedestroy($img);
?>