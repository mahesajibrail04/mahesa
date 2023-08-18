<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Pakar Jagung</title>
    <link rel="shortcut icon" href="img/jgg.png">
    <style>
      .bg-toska{
      background-color:  blue;
     }
      </style>
      <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-toska">
  <div class="container-fluid">
    <img src="img/jgg.png" alt="" width="50" height="50"  class="d-inline-block align-top">
    <a class="navbar-brand" href="?">PAKAR JAGUNG | Dempster Shafer</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

              <li class="nav-item"><a href="?m=hitung" class="nav-link active">Konsultasi</a></li>
              <li class="nav-item"><a href="?m=penyakit_detil" class="nav-link active">Penyakit</a></li>
              <li ><a href="?m=login" class="btn btn-warning" type="button">Login</a></li>

</nav>


<div class="container">
<?php if (isset($_GET['m'])): ?>
	<?php
	$mod=$_GET['m'];
    if (file_exists($mod . '.php'))
      include $mod . '.php';
    else
    ?>

<?php else:
 ?>

 <main class="px-3">
   <h1> </h1>
   <br><br/>
    <h1>Selamat Datang </h1>
    <p class="lead">Di Sistem Pakar Diagnosa Penyakit Pada Tanaman Jagung</p>
    <p class="lead">
      <a href="?m=hitung" class="btn btn-lg btn-secondary fw-bold border-danger bg-danger">Konsultasi</a>
    </p>
    
   <center><h5>Jagung merupakan tanaman pangan utama ketiga setelah padi dan  gandum  di  dunia  dan  menempati  posisi  kedua  setelah  padi  di  Indonesia.  Di Indonesia,  produktivitas  jagung  mengalami  peningkatan  tiap  tahunnya Namun, produktivitas jagung dapat mengalami penurunan kuantitas dan kualitas hasil panen karena adanya serangan penyakit dan keterlambatan pengendalian penyakit tersebut yang  berujung  pada  kegagalan  panen. oleh karena itu sistem pakar jagung dibuat untuk membantu mengetahui penyakit dan solusi pada tanaman jagung anda. </h5></center>
   
  <footer class="mt-auto text-dark-50">
    <p></p>  </main>
  </footer>
  <center> <img src="img/tess.png"class="rounded" alt="..."></center>
 
<?php endif; ?>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
