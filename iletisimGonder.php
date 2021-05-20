<?php
ob_start();
session_start();
require 'baglan.php';
if(isset($_POST['gonder'])){

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    //veritabanı kayıt işlemi
    $sorgu = $db->prepare('INSERT INTO iletisim SET firstName = ?, lastName = ?, email = ?, message = ?');
    $ekle = $sorgu->execute([
        $firstName, $lastName, $email, $message
    ]);
    if($ekle){
        echo "Mesajınız başarıyla gönderildi";
        header('Refresh:2, iletisim.html');
    }else{
        echo "Bir hata oluştu, tekrar deneyin";
        header('Refresh:2, iletisim.html');
    }
}
   
?>