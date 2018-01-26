<?php
include 'koneksi.php';
$id_produk=$_POST['id_produk'];
	$hapusproduk=mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk='$id_produk'");
	if ($hapusproduk)
	{
?>
		<script language="javascript">alert("Produk berhasil dihapus.");</script>
		<script>document.location.href='../produk.php';</script>
<?php
	}
	else
	{
?>
		<script language="javascript">alert("Produk gagal dihapus. Silahkan coba lagi.");</script>
		<script>document.location.href='../produk.php';</script>
<?php
	}
mysqli_close($koneksi);
?>