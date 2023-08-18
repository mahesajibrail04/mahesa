<?php include 'db.php' ?>
  <body>

<div class="container">

	<!-- mulai form rubah password -->
  <div class="container">
    <div class="judul">
      <h1></h1>
	  <br><br/>
      <h1>Ubah Password</h1>
    
    <br/><br/>
    <form action="" method="post">

      <div class="col-md-3">

        <div class="mb-3">
        <label  class="form-label">Password Lama</label>
        <input type="text" class="form-control" name="password_lama" placeholder="Password Lama">


        <label  class="form-label">Password Baru</label>
        <input type="text" class="form-control" name="password_baru" placeholder="Password Baru">


        <label  class="form-label">Konfirmasi Password Baru</label>
        <input type="text" class="form-control" name="konfirmasi_password" placeholder="Konfirmasi Password Baru">
        </div>

          <button class="btn btn-success"type="submit" name="Submit">Selesai</button>
		  <h1>________________</h1>
</div>

            </div>
</div>

</body>
<?php
  //proses jika tombol rubah di klik
	if(isset($_POST['Submit'])){
		//membuat variabel untuk menyimpan data inputan yang di isikan di form
		$password_lama			= $_POST['password_lama'];
		$password_baru			= $_POST['password_baru'];
		$konfirmasi_password	= $_POST['konfirmasi_password'];

		//cek dahulu ke database dengan query SELECT
		//kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
		//encrypt -> md5($password_lama)
		$password_lama	=md5($password_lama);
		$cek 			= mysqli_query($db,"SELECT password FROM ds_admin WHERE password='$password_lama'");

		if(mysqli_num_rows($cek)){
			//kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
			//membuat kondisi minimal password adalah 5 karakter
			if(strlen($password_baru) >= 5){
				//jika password baru sudah 5 atau lebih, maka lanjut ke bawah
				//membuat kondisi jika password baru harus sama dengan konfirmasi password
				if($password_baru == $konfirmasi_password){
					//jika semua kondisi sudah benar, maka melakukan update kedatabase
					//query UPDATE SET password = encrypt md5 password_baru
					//kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
					$password_baru 	= md5($password_baru);
					$id_user 		= $_SESSION['username']; //ini dari session saat login

					$update 		= mysqli_query($db, "UPDATE ds_admin SET password='$password_baru' WHERE user='$id_user'");
					if($update){
						//kondisi jika proses query UPDATE berhasil?>
						  <div class="alert alert-success" role="alert"><?php echo "PASSWORD TELAH DIRUBAH"?> <?php
					}else{
						//kondisi jika proses query gagal
						?>	<div class="alert alert-danger" role="alert"><?php echo "GAGAL MERUBAH PASSWORD"?> <?php
					}
				}else{
					//kondisi jika password baru beda dengan konfirmasi password
					?>	<div class="alert alert-danger" role="alert"><?php echo "GAGAL PASSWORD COCOK"?> <?php
				}
			}else{
				//kondisi jika password baru yang dimasukkan kurang dari 5 karakter
				?>	<div class="alert alert-danger" role="alert"><?php echo "PASSWORD BARU KURANG DARI 5"?> <?php
			}
		}else{
			//kondisi jika password lama tidak cocok dengan data yang ada di database
			?>	<div class="alert alert-danger" role="alert"><?php echo "PASSWORD LAMA TIDAK COCOK"?> <?php
		}
	}
	?>
