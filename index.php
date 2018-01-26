<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Page</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="css/style2.css">
<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<style>


</style>
 </head>
<body bgcolor="white">

<!-- LOGIN PAGE -->
  <div class="login-form">
	<form action="./modul/login.php"  method="POST">
		  <center>
			<img src="gambar/ayaman.png" alt="foto-profil" style="width:120px;height:100px;margin-top:-80px;">
		  </center>  
			 <div class="form-group ">
			   <input type="text" class="form-control" id="username" name="username" placeholder="Username">
			   <i class="fa fa-user"></i>
			 </div>
			 <div class="form-group log-status">
			   	<input type="password" class="form-control" id="password" name="password" placeholder="Password">
			   <i class="fa fa-lock"></i>
			 </div>

			 <button type="submit" class="log-btn" >Log in</button>
				<center>
					<img src="gambar/tulisan.png" alt="foto-profil" style="width:320px;height:120px;">
				</center>
	</form>	
   </div>

<script type="text/javascript">


</script>
</body>
</html>