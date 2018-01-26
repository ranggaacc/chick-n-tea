<?php
include 'koneksi.php';
$tanggal = $_POST['tgl_hapus'];
$uraian = $_POST['uraian'];
$hapuspengeluaran=mysqli_query($koneksi, "DELETE FROM pengeluaran WHERE tanggal='$tanggal' AND uraian='$uraian'");

	if($hapuspengeluaran == TRUE) {
	?>
		<script language="javascript">alert("berhasil dihapus");</script>
		<script>document.location.href='../pengeluaran.php?tanggal=<?php echo $tanggal ?>';</script>
	<?php 
	}
	
mysqli_close($koneksi);
?>