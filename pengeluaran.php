<?php
	include './modul/session.php';
	if(isset($_GET['tanggal'])) {
		$tanggal=$_GET['tanggal'];
		echo $tanggal;
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pengeluaran</title>
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
	.w3-btn-floating{
		position:fixed;
		z-index:10;
		bottom:10px;
		right:10px;
		padding:30px;
		}

table {
    border-collapse: collapse;
    border-spacing: 0;
    border: 1px solid #bbb;
}
td, th {
    border-top: 1px solid #ddd;
    padding: 4px 8px;
}
tbody tr:nth-child(even) td {
    background-color: #eee;
}
</style>
<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<script>
            function tampilkanPreview(gambar,idpreview){
//                membuat objek gambar
                var gb = gambar.files;
                
//                loop untuk merender gambar
                for (var i = 0; i < gb.length; i++){
//                    bikin variabel
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var preview=document.getElementById(idpreview);            
                    var reader = new FileReader();
                    
                    if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
                        preview.file = gbPreview;
                        reader.onload = (function(element) { 
                            return function(e) { 
                                element.src = e.target.result; 
                            }; 
                        })(preview);
 
    //                    membaca data URL gambar
                        reader.readAsDataURL(gbPreview);
                    }else{
//                        jika tipe data tidak sesuai
                        alert("Type file tidak sesuai. Khusus image.");
                    }
                   
                }    
            }
        </script>
</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="ayam" href="#"><img src="gambar/ayaman.png" style="width:70px;height:50px;"> </a>

				<!-- /.drop down pojok kanan atas-->
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="./modul/logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
							
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

		<ul class="nav menu">
			<li><a href="dashboard.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="Produk.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Produk</a></li>
			<li><a href="penjualan.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Penjualan</a></li>
			<li class="active"><a href="pengeluaran.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Pengeluaran</a></li>
			<li><a href="table.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tables</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pengeluaran</h1>
			</div>
		</div><!--/.row-->
		

<div class="panel panel-default">
  <div class="panel-body">
  
			<!--Datepicker-->
  					<div class="row">
						<div class="col-md-4">
								<div class="form-group">
								<form action="pengeluaran.php" method="get" id="tanggalhalaman">
									<label for="tanggal">Tanggal</label>
									<input type="text" name="tanggal" value="<?php if(isset($_GET['tanggal'])) echo $tanggal;?>" id="tanggal" form="tanggalhalaman" />
									<input type="submit" class="btn btn-md" form="tanggalhalaman" value="Submit">
								</form>
								</div>
						</div>
					</div>

					
			<!--/.TABEL PENGELUARAN-->				
					<div class="row">
						<div class="col-lg-12">
						<h1 class="page-header">Pengeluaran</h1>
						</div>
					</div>
					<div class="row">
						<button type="button" data-toggle="modal" data-target=".pengeluaran"  class="btn btn-primary btn-md pull-left "style="margin:10px;">Tambah</button>
					</div>
					
								<table class="table table-bordered">
										<thead>
											<th><center>No</center></th>
											<th><center>Uraian</center></th>
											<th><center>JUMLAH</center></th>

										</thead>
									<?php
										include './modul/koneksi.php';
										$angka=1;
										if(isset($_GET['tanggal'])) {
											$sql_ambilpengeluaran=mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE tanggal='$tanggal'");
											while ($data = mysqli_fetch_array($sql_ambilpengeluaran)) //melooping pada setiap data hasil query
											{ ?>					
												<tr>
													<td style="width:5%;"><center><?php echo $angka;?></center></td> 
													<td style="width:55%;">	<?php echo $data['uraian'];?></td>
													<td style="width:40%;"  class="subtotalpengeluaran"><?php echo $data['jumlah'];?>
														<form id="formpengeluaran" method="POST" action="./modul/hapuspengeluaran.php">
															<input type="hidden" form="formpengeluaran" value="<?php if(isset($_GET['tanggal'])) echo $tanggal;?>" class="tgl_hapus" name="tgl_hapus"/>
															<input type="hidden" form="formpengeluaran" name="uraian" value="<?php echo $data['uraian']; ?>">
																<button type="submit" form="formpengeluaran" class="btn btn-danger btn-md pull-right">Hapus</button> </td>
														</form>
												</tr>
										  <?php
										  $angka++;
											}
										}
									 ?>
											<tr style="border:3px solid #bebebe;">
												<td><b>TOTAL</b></td>
												<td></td>
												<td id="subtotalpengeluaran" style="font-weight:bold;"> </td>
											</tr>
								</table>
	</div>
</div>

	<!--/.FLOATING BUTTON-->
			<div class="w3-container" data-toggle="modal" data-target=".produk">
			  <a class="w3-btn-floating w3-green"><span style="position:absolute; top:9px; left:20px;">+</span></a>
			</div>	
			
	<!-- Small modal TAMBAH -->


		<div class="modal fade produk" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		  <div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
					<div class="col-md-14">
						<div class="panel panel-primary">
						  <div class="panel-heading">Tambah Produk</div>
						  <div class="panel-body">	
							<form action="./modul/insert.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="email">Nama Produk	:</label>
									<input type="text" maxlength="14" class="validate" id="nama_produk" placeholder="Nama Produk" name="nama_produk" required>
								</div>
								<div class="form-group">
									<label for="pwd" >Harga Produk :</label>
									<input type="number" maxlength="14" class="validate" id="harga_produk" placeholder="Harga Produk" name="harga_produk" required>
								</div>
							
								<div class="panel-footer">
									<div class="input-group">
										<span class="input-group-btn">
											<div class="row">
												<div class="input-field col s8">
													<i class="material-icons prefix"></i>
													<div class="file-field input-field">
														<div class="btn">
															<p>Gambar
															<input type="file" name="gambar" accept="image/*"  onchange="tampilkanPreview(this,'preview')"/>
															</p>
															<!--element image untuk menampilkan preview-->
															<img id="preview" src="" alt="" width="220px"/>
														</div>
													</div>
												</div>
											</div>
										<input type="submit" class="green accent-5 waves-effect waves-light btn" value="submit" style="margin-right:15px;" required>										</span>
									</div>
								</div>
							</form>
						  </div>
						</div>
					</div>
			</div>
		  </div>
		</div>
	<!--/.FLOATING BUTTON-->
	
<!-- Small modal TAMBAH PENGELUARAN -->

		<div class="modal fade pengeluaran" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		  <div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
					<div class="col-md-14">
						<div class="panel panel-primary">
						  <div class="panel-heading">Tambah Pengeluaran</div>
						  <div class="panel-body">	
							<form action="./modul/tambahpengeluaran.php" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?php if(isset($_GET['tanggal'])) echo $tanggal;?>" id="tanggalpengeluaran" name="tanggalpengeluaran"/>
								<div class="form-group">
									<label for="email">URAIAN:</label>
									<input type="text" maxlength="14" class="validate" id="uraian" placeholder="uraian" name="uraian" required>
								</div>
								<div class="form-group">
									<label for="pwd" >JUMLAH :</label>
									<input type="number" maxlength="14" class="validate" id="jumlah" placeholder="jumlah" name="jumlah" required>
								</div>
								<button type="submit" class="btn btn-success btn-md pull-right">Simpan</button>
							</form>
						  </div>
						</div>
					</div>
			</div>
		  </div>
		</div>	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
<!-- /.Date Picker-->		
		<script src="js/jquery.min.2.0.2.js"></script>
		<script src="js/duit.min.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#tanggal').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                });
				
				$('#tanggal').change(function(){
					//$('#tanggalpengeluaran').val($(this).val());
					//alert($('#tanggalpengeluaran').val());
					//$('.tgl_hapus').val($(this).val());
				});
				
				total_pengeluaran();
				duit2();
            });
			function kali(valu,harga){
				var nilai = $('#produk'+valu).val();
				document.getElementById("hasilkali"+valu).innerHTML = nilai*harga;
			}
			
			function total(){
				var tmptotal=$('.subtotal');
				var total=0;
				for (var i=0;i<tmptotal.length;i++){
					if(tmptotal[i].innerHTML!=""){
						var harga = parseInt(tmptotal[i].innerHTML);
						total+=harga;
					
					}
				}
				$("#totalpenjualan").text(total);

			}
			function total_pengeluaran(){
				var tmptotal=$('.subtotalpengeluaran');
				var total=0;
				for (var i=0;i<tmptotal.length;i++){
					if(tmptotal[i].innerHTML!=""){
						var harga = parseInt(tmptotal[i].innerHTML);
						total+=harga;
					
					}
				}
				$("#subtotalpengeluaran").text(total);

			}
			function duit() {
				var	formatduit ="Rp. "+ $("#totalpenjualan").text().toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
				$("#totalpenjualan").text(formatduit);
			}
			function duit2() {
				var	formatduit ="Rp. "+ $("#subtotalpengeluaran").text().toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
				$("#subtotalpengeluaran").text(formatduit);
			}
			
	</script>
</body>

</html>
