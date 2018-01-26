<?php
	include 'koneksi.php';
	session_start();
	if (!isset($_SESSION['username']))
	{
		$_SESSION['status'] = "nouser";
	}
	$username=$_POST['username'];
	$password=$_POST['password'];/*enkripsi*/
			$login=mysqli_query($koneksi, "SELECT * FROM user where username='$username' and password='$password'"); /*eksekusi query*/
			$hasil = mysqli_fetch_array($login);
			if($hasil)
			{
				$_SESSION['username']=$row['username'];
				$_SESSION['status']="admin";
				header('location:../dashboard.php');
			}
			else 
				{ 
				?>
					<script language="javascript">alert("Login gagal.silahkan coba lagi!");</script>
					<script>document.location.href='../';</script>
				<?php 
				}


?>