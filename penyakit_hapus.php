<?php include 'db.php' ?>
<?php
$id = $_GET['id'];
mysqli_query($db,"DELETE FROM ds_penyakit WHERE id='$id'")or die(mysql_error());

header("location:admin.php?m=penyakit_detil");
?>
