<?php
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	?>

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
    <title>Pakar Jagung | Dempster Shafer</title>
		<link rel="shortcut icon" href="img/jgg.png">
    <style>
      .bg-toska{
      background-color: blue;
     }
      </style>
  </head>
  <body>

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

              <li class="nav-item"><a href="?m=penyakit_detil"class="nav-link active">Penyakit</a></li>
              <li class="nav-item"><a href="?m=gejala_detil"span class="nav-link active"> Gejala</a></li>
              <li class="nav-item"><a href="?m=rule_detil"span class="nav-link active"> Rules</a></li>
              <li class="nav-item"><a href="?m=hitung"span class="nav-link active">Tes Konsultasi</a></li>
              <li class="nav-item"><a href="?m=password_edit"span class="nav-link active"> Password</a></li>
              <li ><a href="logout.php?act=logout" class="btn btn-danger" type="button"> Logout</a></li>
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
 ?><h1></h1>
 <br><br/>
 <h1>Selamat Datang <?php echo $_SESSION['username']; ?></h1>
 <div class="text-center">
  <img src="img/jgg.png"class="rounded" alt="...">
</div>
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
