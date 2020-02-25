<?php 
$host		="localhost";
$user		="root";
$pass		="";
$db_name	="db_test";
$connect    =mysqli_connect("$host","$user","$pass","$db_name");

if ($connect->connect_error){
	echo "Gagal Koneksi ke Server";
}
else{
	?><script type="text/javascript">alert("Berhasil Koneksi ke server");</script>
	<?php 
}






 ?>