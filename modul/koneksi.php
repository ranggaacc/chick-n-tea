<?php
	$mysql_host="localhost"; /* $mysql_host boleh diganti karena pake pc sendiri*/
	$mysql_root="root"; /* $mysql_root boleh diganti */
	$mysql_password=""; /* $mysql_password boleh diganti */
	$dbnya="ciken"; /* $dbnya boleh diganti dari nama database*/

	
	$koneksi=mysqli_connect($mysql_host,$mysql_root,$mysql_password,$dbnya);
	if(!$koneksi)
	{
		echo 'Tidak terkoneksi dengan Mysql';
	}
	
	
  /*buat cek terhubung gak*/
	
?>
