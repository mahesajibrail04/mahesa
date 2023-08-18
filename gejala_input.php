<?php include 'db.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Tambah Gejala</title>
  </head>
  <body>
    <div class="container">
      <h1></h1>
      <br><br/>
      <h1>Tambah Data Gejala</h1>
      <br><br/>
      <a type="button" class="btn btn-danger" href="?m=gejala_detil">Kembali</a>
      <br/><br/>
      <form action="" method="post">

        <div class="col-md-3">

          <div class="mb-3">
          <label  class="form-label">KODE GEJALA</label>
          <input type="text" class="form-control" name="kode" placeholder="G?">
          </div>

          <label  class="form-label">NAMA GEJALA</label>
          <input type="text" class="form-control" name="nama" placeholder="Nama Gejala?">

          <div class="form-group">
				<label>Gambar :</label>
				<input type="file" name="gambar" required="required">

          <div class="mb-3">
          <label class="form-label">BELIEF</label>
          <input type="text" class="form-control" name="cf" placeholder="Belief?">
          </div>

          <div class="mb-3">
            <button class="btn btn-success"type="submit" name="Submit">Selesai</button>
          </div>
</div>

              </div>

      </form>
      <?php

      // ini ambil dari form
      if(isset($_POST['Submit'])) {
          $kode = $_POST['kode'];
          $nama = $_POST['nama'];
          $gambar = $_POST['gambar'];
          $cf = $_POST['cf'];
      // yang ini cek data sama
          $proses= mysqli_num_rows (mysqli_query($db,"SELECT kode_gejala FROM ds_gejala WHERE kode_gejala='$kode'"));
          if ($proses>0) {?>
            <div class="alert alert-danger" role="alert"><?php echo "KODE SUDAH TERDAFTAR SILAHKAN PILIH KODE LAIN"?>; <?php
          }else {
            $result = mysqli_query($db,"INSERT INTO ds_gejala VALUES('','$kode','$nama','$gambar','$cf')");

?>
            <div class="alert alert-success" role="alert"><?php echo "DATA BERHASIL DITAMBAHKAN. ";  ?><a href="?m=gejala_detil">Lihat Data Gejala</a>
    </div>
        <?php   }

      }
      ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
