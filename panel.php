<!doctype html>
<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <!-- Required meta tags -->
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <title>Panel</title>
  </head>
  <body>

    <!--Menü Başlangıç-->
  <div id="social">
    <nav class="navbar  navbar-dark bg-dark fixed-top">
      <a class="navbar-brand navBaslik" href="index.html">DÜZCE | Mehmetali Demirtaş</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link"  href="index.html">Hakkımızda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ozgecmis.html">Özgeçmiş</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sehrim.html">Şehrim</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mirasimiz.html">Mirasımız</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ilgialanlarim.html">İlgi Alanlarım</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="iletisim.html">İletişim</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.html">Login</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
    <!--Menü Bitiş-->

    <!--Form Başlangıç-->
    <section class="p5 text-center iletisim">
      <h1 class="iletisimBaslik">KULLANICI PANELİ</h1>
      <hr class="ayrac">
      <h2>İletişim Verileri</h2> <br> 
    <div class="container table-responsive-lg">       
        <table class="table table-hover">
          <thead>
            <tr>
              <th>İsim</th>
              <th>Soyisim</th>
              <th>Email</th>
              <th>Mesaj</th>
            </tr>
            <?php
              session_start();
              if($_SESSION["user"]==""){
                echo "<script>window.location.href='cikis.php'</script>";
              }else{ 
                echo "<a href='cikis.php'>ÇIKIŞ YAP</a><br><br>";               
              //echo"Kullanıcı Adı:".$_SESSION['email'];
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "kayit";
              $conn = new mysqli($servername, $username, $password, $dbname);
              $conn->set_charset("utf8");
              // Bağlantı Kontrol
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }
              $sql =  "SELECT firstName, lastName, email, message FROM iletisim";
              $result = $conn->query($sql);
              
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "
                <tr>
                  <td>".$row["firstName"]."</td>
                  <td>".$row["lastName"]."</td>
                  <td>".$row["email"]."</td>
                  <td>".$row["message"]."</td>
                </tr>
                ";
              }
              }else{
                echo "Veritabanında kayıtlı veri bulunamadı";
              }
              $conn->close();
            }
            ?>
          </thead>         
        </table>
      </div>   
      </section>
    <!--Form bitiş-->
    <!--Footer Başlangıç-->

    <div class="footer">
        <p>
          <span>
            Tüm Hakları Saklıdır &copy; | 2021
          </span><br>
          <span>
            Designed by <b>MEHMETALIDEMIRTAS</b>
          </span>
        </p>
    </div>

    <!--Footer Bitiş-->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

