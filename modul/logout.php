<?php
session_start();

include('koneksi.php');

$berhasil = session_destroy();
if($berhasil)
{
?>
	<script language="javascript">alert("Logout Berhasil.");</script>
	<script>document.location.href='../index.php';</script>
<?php
}

mysqli_close($koneksi);
?>