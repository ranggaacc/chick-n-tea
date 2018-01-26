<?php
	include './modul/session.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Produk</title>

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
			<li class="active"><a href="Produk.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Produk</a></li>
			<li><a href="penjualan.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Penjualan</a></li>	
			<li><a href="pengeluaran.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Pengeluaran</a></li>			
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
				<h1 class="page-header">Produk</h1>
			</div>
		</div><!--/.row-->
		
			

<!-- /.panel konten -->	
		
		<div class="row">
			<div class="col-md-12">
			
				<div class="panel panel-default">
					<div class="panel-heading" id="accordion">
					<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>Daftar Produk</div>
					<div class="panel-body">
						<div class="row">
							<div class="panel panel-default">

							  <!-- Thumbnail PRODUK -->
							<div class="row">
								<div class="col-md-12">
								  <?php
									include './modul/koneksi.php';
									$sql_ambilproduk=mysqli_query($koneksi, "SELECT * FROM produk");
									while ($data = mysqli_fetch_array($sql_ambilproduk)) //melooping pada setiap data hasil query
									{ ?>
									<div class="col-md-3"  style="border:1px solid #000;border-radius:12px; padding:10px; margin:10px;">
										<span class="thumbnail">
											<img src="<?php $data['gambar']==''?print("./gambar/default.png"):print("./upload/".$data['gambar']); ?>" style="max-width:70%;height:150px;">
										</span>
											<div class="row">
												<div class="col-md-8" style="text-align:center">
													<b><?php echo $data['nama_produk'];?></b>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8">
													<b></b>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-8" style="text-align:center">
													<?php echo "Rp. ".number_format(intval($data['harga_produk']), 2,",", ".");?>
												</div>
											</div>
											<span class="input-group-btn" style="text-align:right">
													
													<div class="w3-container" data-toggle="modal" data-target=".edit">
													<input id="id_produk" type="hidden" name="id_produk" />
														<a data-toggle="modal" href="#edit<?php echo $data['id_produk'];?>"class="btn btn-primary btn-md">Edit</a>

													<form method="POST" action="modul/deleteproduk.php" onclick="javascript: return confirm('Anda yakin hapus ?')" style="display:inline">
														<input id="id_produk" type="hidden" name="id_produk" value="<?php echo $data['id_produk'];?>" />
														<button class="btn btn-danger btn-md pull-right" name="action" type="submit" >Hapus</button>
													</form>
													</div>
											</span>
									</div>

                                               
 <!-- Small modal EDIT -->

                                    <div id="edit<?php echo $data['id_produk'];?>" class="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="col-md-14">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">EDIT PRODUK</div>
                                                            <div class="panel-body">
                                                                <form action="./modul/editproduk.php" method="post" enctype="multipart/form-data">
                                                                     <input type="hidden" name="id_produk" value="<?php echo $data['id_produk'];?>">
																<div class="form-group">
																	<label for="email">Nama Produk	:</label>
																	<input type="text" maxlength="14" class="validate" name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="<?php echo $data['nama_produk'];?>">
																</div>
                                                                <div class="form-group">
                                                                    <label for="pwd">Harga Produk :</label>
                                                                        <input type="number" maxlength="14" class="validate" value="<?php echo $data['harga_produk'];?>" id="harga_produk" placeholder="Harga Produk" name="harga_produk" required>
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
																									<input type="file" name="gambar" style="display:inline">
																									</p>
																								</div>
																							</div>
																						</div>
																					</div>
																					<input type="submit" class="green accent-5 waves-effect waves-light btn btn-primary" value="submit" style="margin-right:15px;" required>										</span>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

								 
								  <?php
								  }
								  ?>
								   </div>
							</div>

							</div>
						</div>
					</div>
				</div>
			</div>
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
									<label>Nama Produk	:</label>
									<input type="text" maxlength="14" class="validate" id="nama_produk" placeholder="Nama Produk" name="nama_produk" required>
								</div>
								<div class="form-group">
									<label>Harga Produk :</label>
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

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>

	
<!-- /.Date Picker-->		
		<script src="js/jquery.min.2.0.2.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
	</script>
</body>

</html>
