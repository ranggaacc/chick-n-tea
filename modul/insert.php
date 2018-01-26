<?php
	include 'koneksi.php';
	$nama_produk=$_POST['nama_produk'];
	$harga_produk=$_POST['harga_produk'];
	$gambar_nama=$_FILES["gambar"]["name"];
	$gambar_tmpnama=$_FILES['gambar']['tmp_name'];
	$gambar_ukuran=$_FILES['gambar']['size'];
	$gambar_format=pathinfo($gambar_nama,PATHINFO_EXTENSION);
	$gambar_format = strtolower($gambar_format);
	if ($gambar_ukuran > 10000000 || file_exists($gambar_nama) || ($gambar_format!=="jpg" && $gambar_format!=="png" && $gambar_format!=="bmp" && $gambar_format!=="gif" && $gambar_format!=="jpeg" && $gambar_format!=="JPG"))
	{
		?>
			<script language="javascript">alert("Error");</script>
			<script>document.location.href='../produk.php';</script>
		<?php 
	}
	else
	{
		$upload = move_uploaded_file($gambar_tmpnama, "../upload/".$gambar_nama);
		$query	= "INSERT INTO `produk` (`nama_produk`, `harga_produk`, gambar) 
			VALUES ('$nama_produk','$harga_produk', '$gambar_nama')";
			$insert=mysqli_query($koneksi,$query) or die(mysqli_error($koneksi)); //koneksiin dlu  $koneksi dari koneksi
			 //kalo string pake kutip '',, `` syntax ke sql /// insert urutan nilai dari db nya"kolom"
		if($insert == TRUE) {
		?>
			<script language="javascript">alert("berhasil ditambahkan");</script>
			<script>document.location.href='../produk.php';</script>
		<?php 
		}
	}
mysqli_close($koneksi);

?>