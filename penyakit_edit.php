	<?php include 'db.php' ;
	ob_start()?>
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
				<div class="judul">
					<h1></h1>
					<br><br/>
					<h1>Edit Data Penyakit</h1>
					</div>

					<br/>

					<a type="button" class="btn btn-danger"  href="?m=penyakit_detil" />Kembali</a>
					<br><br/>
					<br/>


					<?php
					$id = $_GET['id'];
					$query_mysql = mysqli_query($db,"SELECT * FROM ds_penyakit WHERE id='$id'")or die(mysqli_error($db));
					$nomor = 1;
					while($data = mysqli_fetch_array($query_mysql)){
					?><form action="" method="post">

		        <div class="col-md-3">

		          <div class="mb-3">
		          <label  class="form-label">KODE PENYAKIT</label>
							<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
							 <input type="text" readonly class="form-control-plaintext" name="code" value="<?php echo $data['kode_penyakit'] ?>">
		          </div>

		          <label  class="form-label">NAMA PENYAKIT</label>
		          <input type="text" class="form-control" name="name" value="<?php echo $data['nama_penyakit'] ?>">


		          <div class="mb-3">
		          <label class="form-label">SOLUSI</label>
		          <textarea class="form-control" name="notes" rows="4" ><?php echo $data['notes'] ?></textarea>
		          </div>
				  <label>Gambar</label>
				<input type="file" name="gambar" required="required">
				
	</div>

		          <div class="mb-3">
		            <br></br><button class="btn btn-success"type="submit" name="Submit">Selesai</button>
		          </div>


		        </div>
			</div>
		      </form>

					<?php } ?>
			</div>
			<?php
			if (isset($_POST['Submit'])) {
				include 'config.php';
				$id = $_POST['id'];
				$code = $_POST['code'];
				$name = $_POST['name'];
				$notes = $_POST['notes'];
				$gambar = $_POST['gambar'];
				mysqli_query($db,"UPDATE ds_penyakit SET kode_penyakit='$code', nama_penyakit='$name', notes='$notes', gambar='$gambar' WHERE id='$id'");
				header("location: ?m=penyakit_detil");
			}

			?>
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	  </body>
	</html>
