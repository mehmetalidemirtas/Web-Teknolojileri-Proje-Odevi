<?php
ob_start();
session_start();
require 'baglan.php';

if(isset($_POST['kayit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_again = @$_POST['password_again'];

    $kullanici_sor = $db->prepare ('SELECT * FROM users WHERE user_email = ?');
    $kullanici_sor->execute([
        $email
    ]);
    $say = $kullanici_sor->rowCount();

    if($say==1){
        $_SESSION['email']=$email;
        echo "Kullanıcı zaten var";
        header('Refresh:2, login.html');
    }elseif(!$email){
        echo "Lütfen kullanıcı adınızı girin";
        header('Refresh:2, login.html');
    }elseif(!$password || !$password_again){
        echo "Lütfen parolanızı girin";
        header('Refresh:2, login.html');
    }elseif($password != $password_again){
        echo "Girdiğiniz parolalar birbiri ile aynı değil";
        header('Refresh:2, login.html');
    }else{
        //veritabanı kayıt işlemi
        $sorgu = $db->prepare('INSERT INTO users SET user_email = ?, user_password = ?');
        $ekle = $sorgu->execute([
            $email, $password
        ]);
        if($ekle){
            echo "Kayıt başarıyla gerçekleşti, yönlendiriliyorsunuz";
            header('Refresh:2, panel.php');
        }else{
            echo "Bir hata oluştu, tekrar deneyin";
            header('Refresh:2, login.html');
        }
    }
}
if(isset($_POST['giris'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!$email){
        echo "Lütfen kullanıcı adınızı girin";
        header('Refresh:2, login.html');
    }elseif(!$password){
        echo "Parolanızı girin";
        header('Refresh:2, login.html');
    }else{
        $kullanici_sor = $db->prepare ('SELECT * FROM users WHERE user_email = ? && user_password = ?');
        $kullanici_sor->execute([
            $email, $password
        ]);
        $say = $kullanici_sor->rowCount();
        if($say==1){
            $_SESSION["user"]=$email;
            echo "Başarıyla giriş yaptınız, yönlendiriliyorsunuz \n";
            echo "<br>";
            echo "Hoşgeldiniz $email \n";
            echo "<br>";
            echo "Kullanıcı adı: $email \n";
            echo "<br>";
            echo "Parola: $password \n";
            echo "<br>";
            header('Refresh:3, panel.php');
        }else{
            echo "Kullanıcı adı veya parola yanlış, tekrar deneyiniz";
            header('Refresh:2, login.html');
        }
    }
}


?>