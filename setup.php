<?php 
	$file = file_exists('config.txt');



	if($file):
	elseif(isset($_POST['setup'])):
		$dbhost = $_POST['dbhost'];
		$dbuser = $_POST['dbuser'];
		$dbpassword = $_POST['dbpassword'];
		$dbname = $_POST['dbname'];
		//
		$uname_admin = $_POST['uname_admin'];
		$password_admin = $_POST['password_admin'];
		$repassword = $_POST['repassword'];
		$title = $_POST['title'];
		//
		if ($password_admin != $repassword) {
			echo "Konfirmasi Password salah!";
		}else{
			$config = "dbhost=$dbhost&dbuser=$dbuser&dbpassword=$dbpassword&dbname=$dbname&username=$uname_admin&password=".md5($password_admin)."&title=$title";
			$handle = fopen('config.txt', 'w') or die('Gagal membuat file');
			fwrite($handle, $config);
			header("location: setup-2.php");

		}

	else:


 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Setup</title>
 </head>
 <body>
 	<form action="" method="post">
 		<label>Server:</label>
 		<input type="text" name="dbhost" placeholder="Database Host" required>
 		<br>
 		<label>DB User:</label>
 		<input type="text" name="dbuser" placeholder="Database Username" required>
 		<br>
 		<label>DB Password:</label>
 		<input type="password" name="dbpassword" placeholder="Database Password">
 		<br>
 		<label>DB Name:</label>
 		<input type="text" name="dbname" placeholder="Nama Database" required>
 		<br>
 		<hr>
 		<label>Username Admin:</label>
 		<input type="text" name="uname_admin" placeholder="Username Admin" required>
 		<br>
 		<label>Password Admin:</label>
 		<input type="password" name="password_admin" placeholder="Password Admin" required>
 		<br>
 		<label>Repassword:</label>
 		<input type="password" name="repassword" placeholder="Konfirmasi Password" required>
 		<br>
 		<hr>
 		<label>Judul Situs:</label>
 		<input type="text" name="title" placeholder="Judul Situs" required>
 		<br>

 		<button type="submit" name="setup">Simpan</button>
 	</form>
 	
 </body>
 </html>
 <?php 
 	endif;
  ?>