<?php
	if (!file_exists('config.txt')) {
		header("location:setup.php");
	}else{
		// header("Content-type : application/json"); 
		$cfg = file_get_contents("config.txt");
		$test = explode("&", $cfg);
		$jmlhcfg = count($test);
		for ($i=0; $i < $jmlhcfg; $i++) { 
			# code...
			$data[$i] = explode("=",$test[$i]);

		}
		$server = $data[0][1];
		$dbuser = $data[1][1];
		$dbpassword = $data[2][1];
		$dbname = $data[3][1];
		//
		//
		$config = "<?php ".PHP_EOL." define('dbhost', '$server'); ".PHP_EOL." define('dbuser', '$dbuser'); ".PHP_EOL." define('dbpassword', '$dbpassword'); ".PHP_EOL." define('dbname', '$dbname'); ".PHP_EOL." ?>";
		$handle = fopen('config.php', 'w') or die('Gagal membuat file');
		fwrite($handle, $config);
		header("location:setup-3.php");
	}
 ?>