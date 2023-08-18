<?php include "db.php"; ?>

    	<div class="judul">
        <h1></h1>
		<br><br/>
    		<h1>Rules</h1>
        <style>
          .bg-toska{
          background-color:  blue;
         }
          </style>
      </head>
      <body>

    	<br/>
    	<a class="btn btn-danger" href="?m=rule_input">+ Tambah Data Baru</a>
		<br><br/>
    	<table class="table table-sm">


    		<tr>
    			<th>No</th>
    			<th>ID Penyakit</th>
    			<th>ID Gejala</th>
    			<th>Opsi</th>
    		</tr>

    		<?php

    		$query_mysql = mysqli_query($db,"SELECT ds_rules.id,  ds_rules.id_problem,ds_penyakit.kode_penyakit,ds_penyakit.nama_penyakit,ds_gejala.kode_gejala,ds_gejala.nama_gejala FROM ds_rules JOIN ds_penyakit ON ds_penyakit.id = ds_rules.id_problem
        JOIN ds_gejala ON ds_gejala.id = ds_rules.id_evidence order by kode_penyakit")or die(mysql_error($db));
    		$nomor = 1;
    		while($data = mysqli_fetch_array($query_mysql)){
    		?>
    		<tr>
    			<td><?php echo $nomor++; ?></td>
    			<td><b>[<?php echo $data['kode_penyakit']; ?>]</b><?php echo $data['nama_penyakit']; ?></td>
    			<td><b>[<?php echo $data['kode_gejala']; ?>]</b><?php echo $data['nama_gejala']; ?></td>
    			<td>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
    				<a class="btn btn-danger" href="?m=rule_hapus&id=<?php echo $data['id']; ?>">Hapus</a>
            </div>
    			</td>
    		</tr>
    		<?php } ?>

    	</table>
