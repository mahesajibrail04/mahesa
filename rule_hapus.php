<?php include 'db.php' ?>
<?php
$id = $_GET['id'];
mysqli_query($db,"DELETE FROM ds_rules WHERE id='$id'")or die(mysql_error());

header("location:?m=rule_detil");
?>
