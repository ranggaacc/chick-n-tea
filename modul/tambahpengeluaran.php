<?php
	include 'koneksi.php';
	$tanggal=$_POST['tanggalpengeluaran'];
	$uraian=$_POST['uraian'];
	$jumlah=$_POST['jumlah'];
	
	$insert_query="INSERT INTO `pengeluaran` (`tanggal`, `uraian`, `jumlah`) 
			VALUES ('$tanggal','$uraian', $jumlah)";
			
	$insert=mysqli_query($koneksi,$insert_query) or die(mysqli_error($koneksi));
	if($insert == TRUE) {
	?>
		<script language="javascript">alert("berhasil ditambahkan");</script>
		<script>document.location.href='../pengeluaran.php?tanggal=<?php echo $tanggal ?>';</script>
	<?php 
	}
	
mysqli_close($koneksi);

?>