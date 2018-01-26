<?php
	include 'koneksi.php';
    $id_produk=$_POST['id_produk'];
	$nama_produk=$_POST['nama_produk'];
	$harga_produk=$_POST['harga_produk'];
	$gambar_nama=$_FILES["gambar"]["name"];
	$gambar_tmpnama=$_FILES['gambar']['tmp_name'];
	$gambar_ukuran=$_FILES['gambar']['size'];
	$gambar_format=pathinfo($gambar_nama,PATHINFO_EXTENSION);
	
	$gambar_format = strtolower($gambar_format);
	

		
		$info = mysqli_query($koneksi, "select nama_produk, harga_produk, gambar FROM produk WHERE id_produk='$id_produk'") or die(mysqli_error($koneksi));
		$info = mysqli_fetch_assoc($info);
		
		if($gambar_nama!=""){
			if ($gambar_ukuran > 5000000 || file_exists($gambar_nama) || ($gambar_format!=="jpg" && $gambar_format!=="png" && $gambar_format!=="bmp" && $gambar_format!=="gif" && $gambar_format!=="jpeg"))
				{
					?>
						<script language="javascript">alert("Error");</script>
						<script>document.location.href='../produk.php';</script>
					<?php 
				}
			$upload = move_uploaded_file($gambar_tmpnama, "../upload/".$gambar_nama);
			if(!$upload)
				echo "GAGAL";
		}else{
			$gambar_nama = $info['gambar'];
		}
		if($nama_produk === ''){
			$nama_produk = $info['nama_produk'];
		}
		if($harga_produk == ''){
			$harga_produk = $info['harga_produk'];
		}
		
		
	    $update=mysqli_query($koneksi,"update produk SET nama_produk='$nama_produk', harga_produk='$harga_produk', gambar='$gambar_nama' WHERE id_produk='$id_produk'");
         if(!$update){
			die(mysqli_error($koneksi));
		 }
		?>
			<script language="javascript">alert("berhasil diedit");</script>
			<script>document.location.href='../produk.php';</script>
			
		<?php 
		
mysqli_close($koneksi);

?>