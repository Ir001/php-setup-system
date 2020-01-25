<?php 
	include_once 'config.php';
	$cfg = file_get_contents("config.txt");
	$test = explode("&", $cfg);
	$jmlhcfg = count($test);
	for ($i=0; $i < $jmlhcfg; $i++) { 
				# code...
				$data[$i] = explode("=",$test[$i]);

	}
	// print_r($data);
	$uname = $data[4][1];
	$password = $data[5][1];
	$title = $data[6][1];
	$conn = new mysqli(dbhost, dbuser, dbpassword, dbname);
	$sql = "INSERT INTO admin (username, password) VALUES ('$uname', '$password')";
	$sql1 = "INSERT INTO setting (title) VALUES('$title')";
	$conn->query($sql);
	$conn->query($sql1);
	unlink('config.txt');
	unlink('setup.php');
	unlink('setup-2.php');
	unlink('setup-3.php');
	echo "Sukses";
	header("location:index.php");
	unlink('setup-4.php');
 ?>