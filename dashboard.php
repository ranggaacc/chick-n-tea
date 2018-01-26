<?php
	include './modul/session.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
	.w3-btn-floating{
		position:fixed;
		z-index:10;
		bottom:10px;
		right:10px;
		padding:30px;
		}
	.onboarding{
		width:80%;
		margin:auto;
	
	
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
			<li class="active"><a href="dashboard.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="produk.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Produk</a></li>
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
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="row">
	<div class="onboarding">
		  <div class="carousel-inner" role="listbox">
			<div class="item active">
			  <img src="./gambar/1.PNG" alt="">
			  <div class="carousel-caption">
				<!--<h1 style="font-face jockerman"> TASNGAB </h1>-->
			  </div>
			</div>
			<div class="item">
			  <img src="./gambar/2.PNG" alt="...">
			  <div class="carousel-caption">
				<!--...-->
			  </div>
			</div>
			<div class="item">
			  <img src="./gambar/3.PNG" alt="...">
			  <div class="carousel-caption">
				<!--...-->
			  </div>
			</div>
			<div class="item">
			  <img src="./gambar/4.PNG" alt="...">
			  <div class="carousel-caption">
				<!--...-->
			  </div>
			</div>
			<div class="item">
			  <img src="./gambar/5.PNG" alt="...">
			  <div class="carousel-caption">
				<!--...-->
			  </div>
			</div>
			<div class="item">
			  <img src="./gambar/6.PNG" alt="...">
			  <div class="carousel-caption">
				<!--...-->
			  </div>
			</div>
			<div class="item">
			  <img src="./gambar/7.PNG" alt="...">
			  <div class="carousel-caption">
				<!--...-->
			  </div>
			</div>
			<div class="item">
			  <img src="./gambar/8.PNG" alt="...">
			  <div class="carousel-caption">
				<!--...-->
			  </div>
			</div>		
			
			
		  </div>
		 </div>
	</div>
	

  <!-- Controls -->
   <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

		
	<!--/.FLOATING BUTTON-->
			<div class="w3-container" data-toggle="modal" data-target=".produk">
			  <a class="w3-btn-floating w3-green"><span style="position:absolute; top:9px; left:20px;">+</span></a>
			</div>	
			
	<!-- Small modal -->


		<div class="modal fade produk" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		  <div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
					<div class="col-md-14">
						<div class="panel panel-primary">
						  <div class="panel-heading">Tambah Produk</div>
						  <div class="panel-body">
							<form action="./modul/insert.php" method="post"  method="post" enctype="multipart/form-data">
							  <div class="form-group">
								<label for="email">Nama Produk	:</label>
								<input type="text" maxlength="14" class="validate" id="nama_produk" placeholder="Nama Produk" name="nama_produk">
							  </div>
							  <div class="form-group">
								<label for="pwd" >Harga Produk :</label>
								<input type="number" class="validate" id="harga_produk" placeholder="Harga Produk" name="harga_produk" required>
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
											<input type="submit" class="green accent-5 waves-effect waves-light btn" value="submit" style="margin-right:15px;" required>
										</span>
									</div>
								</div>
							</form>
						  </div>
						</div>
					</div>
			</div>
		  </div>
		</div>
	<!--/.fb-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
</body>

</html>
