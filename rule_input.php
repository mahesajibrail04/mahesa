<?php include 'db.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Tambah Penyakit</title>
  </head>
  <body>
    <div class="container">
      <h1></h1>
      <br><br/>
      <h1>Tambah Data Rules</h1>
      <br><br/>
      <form action="" method="post">

        <div class="col-md-8">

          <div class="mb-8">
            <a type="button" class="btn btn-danger" href="?m=rule_detil">Kembali</a>
            <br/><br/>

          <label  class="form-label">KODE PENYAKIT</label>
          <br>
          <select name="kode_penyakit"class="form-control">
            <?php
            //Perintah sql untuk menampilkan semua data pada tabel penyakit
            $sql="select * from ds_penyakit";
              $hasil=mysqli_query($db,$sql);
              $no=0;
              while ($data = mysqli_fetch_array($hasil)) {
              $no++;
             ?>
              <option value="<?php echo $data['id'];?>">[<?php echo $data['kode_penyakit'];?>]<?php echo $data['nama_penyakit'];?></option>
            <?php
            }
            ?>
          </select>

<br>

          <label  class="form-label">KODE GEJALA</label>
          <select name="kode_gejala" class="form-control">
            <?php
             //Perintah sql untuk menampilkan semua data pada tabel gejala
              $sql="select * from ds_gejala";

              $hasil=mysqli_query($db,$sql);
              $no=0;
              while ($data = mysqli_fetch_array($hasil)) {
              $no++;
             ?>
              <option value="<?php echo $data['id'];?>">[<?php echo $data['kode_gejala'];?>]<?php echo $data['nama_gejala'];?></option>
            <?php
            }
            ?>
          </select>
    </div>
          <div class="mb-3">
            <br>
            <button class="btn btn-success"type="submit" name="Submit">Selesai</button>
          </div>
</div>

              </div>

      </form>
      <?php

      // ini ambil dari form
      if(isset($_POST['Submit'])) {
          $kp = $_POST['kode_penyakit'];
          $kg = $_POST['kode_gejala'];

      // yang ini cek data sama
      $proses=mysqli_num_rows (mysqli_query($db,"SELECT * FROM ds_rules WHERE id_problem='$kp'and id_evidence='$kg'"));
      if ($proses>0) {?>
        <div class="alert alert-danger" role="alert"><?php echo "KODE SUDAH TERDAFTAR SILAHKAN PILIH KODE LAIN"?>; <?php
      }else {
            $result = mysqli_query($db, "INSERT INTO ds_rules VALUES('','$kp','$kg','')");

  ?>
            <div class="alert alert-success" role="alert"><?php echo "DATA BERHASIL DITAMBAHKAN. ";  ?><a href="?m=rule_detil">Lihat Data Penyakit</a>
    </div>
        <?php
}
      }
      ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
