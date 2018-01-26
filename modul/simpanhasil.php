<?php
	include 'koneksi.php';
	$tanggal=$_POST['tanggal'];
	
	$produk_query="SELECT * FROM produk";
	$produk=mysqli_query($koneksi,$produk_query) or die(mysqli_error($koneksi));
	
	
	
	
	while($data=mysqli_fetch_array($produk)){
		$string="quantity".$data['id_produk'];
		$quantity=$_POST[$string];
		
		$cektanggal=mysqli_query($koneksi,"SELECT * FROM penjualan WHERE tanggal='$tanggal' AND `produk`=$data[id_produk] ");
		
		if($quantity!=NULL){
			if(mysqli_num_rows($cektanggal)==0){
				$insert_query="INSERT INTO `penjualan` (`tanggal`, `produk`, `quantity`) 
				VALUES ('$tanggal',$data[id_produk], $quantity)";
		
			}
			else{
				$insert_query="UPDATE `penjualan` SET `quantity`=$quantity WHERE tanggal='$tanggal' AND `produk`=$data[id_produk] ";
			
			}
			$insert=mysqli_query($koneksi,$insert_query) or die(mysqli_error($koneksi));
		
	}
	}

	if($insert == TRUE) {
		?>
			<script language="javascript">alert("berhasil ditambahkan");</script>
			<script>document.location.href='../penjualan.php';</script>
		<?php 
		}
		
	mysqli_close($koneksi);

	


?>