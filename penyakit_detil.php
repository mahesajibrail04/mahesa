<?php include "db.php"; ?>

    	<div class="judul">
        <h1></h1>
		<br><br/>
    		<h1>Data Penyakit</h1>
        <style>
          .bg-toska{
          background-color:  blue;
         }
          </style>
      </head>
      <body>
		<?php 
			if(isset($_SESSION["status"])) {//jika login
				echo '<a class="btn btn-danger" href="?m=penyakit_input">+ Tambah Data Baru</a>';
			}; 
		?>

		<br>
    	<table class="table table-sm">


    		<tr>
    			<th>No</th>
    			<th>Kode</th>
    			<th>Nama Penyakit</th>
    			<th>Solusi</th>
    			<th>Gambar</th>
				<?php 
					if(isset($_SESSION["status"])) {//jika login
						echo '<th>Opsi</th>';
					}; 
				?>
				

    		</tr>

    		<?php
			//-- Mengambil data dari table penyakit
    		$query_mysql = mysqli_query($db,"SELECT * FROM ds_penyakit order by kode_penyakit")or die(mysqli_error($db));
    		$nomor = 1;
    		while($data = mysqli_fetch_array($query_mysql)){
    		?>
    		<tr>
    			<td><?php echo $nomor++; ?></td>
    			<td><?php echo $data['kode_penyakit']; ?></td>
    			<td><?php echo $data['nama_penyakit']; ?></td>
    			<td><?php echo nl2br($data['notes']) ; ?></td>
				<td><img src="img/<?php echo $data['gambar'] ?>" width="250" height="250"></td>
    			<td>
				<div class="btn-group" role="group" aria-label="Basic mixed styles example">	
				<?php 
					if(isset($_SESSION["status"])) { ?>
						<a class="btn btn-success" href="?m=penyakit_edit&id=<?php echo $data['id']; ?>">Edit</a>
						<a class="btn btn-danger" href="?m=penyakit_hapus&id=<?php echo $data['id']; ?>">Hapus</a>
						<?php  }; 
				?>
				
							
				</div>
    			</td>
    		</tr>
    		<?php } ?>

    	</table>
