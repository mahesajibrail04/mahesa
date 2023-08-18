<?php include "db.php"; 
ob_start()?>

    	<div class="judul">
        <h1></h1>
			<br><br/>
    		<h1>Data Gejala</h1>
        <style>
          .bg-toska{
          background-color:  blue;
         }
          </style>
      </head>
      <body>

    	<br/>
    	<a class="btn btn-danger" href="?m=gejala_input">+ Tambah Data Baru</a>
		 <br><br/>
    	<table class="table table-sm">


    		<tr>
    			<th>No</th>
    			<th>Kode</th>
    			<th>Nama Gejala</th>
				<th>Gambar</th>
    			<th>Bobot</th>
    			<th>Opsi</th>
    		</tr>

    		<?php

    		$query_mysql = mysqli_query($db,"SELECT * FROM ds_gejala order by id")or die(mysqli_error($koneksi));
    		$nomor = 1;
    		while($data = mysqli_fetch_array($query_mysql)){
    		?>
    		<tr>
    			<td><?php echo $nomor++; ?></td>
    			<td><?php echo $data['kode_gejala']; ?></td>
    			<td><?php echo $data['nama_gejala']; ?></td>
				<td><img src="img/<?php echo $data['gambar'] ?>" width="250" height="250"></td>
    			<td><?php echo nl2br($data['cf']) ; ?></td>
    			<td>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
    				<a class="btn btn-success" href="?m=gejala_edit&id=<?php echo $data['id']; ?>">Edit</a>
    				<a class="btn btn-danger" href="?m=gejala_hapus&id=<?php echo $data['id']; ?>">Hapus</a>
            </div>
    			</td>
    		</tr>
    		<?php } ?>

    	</table>
