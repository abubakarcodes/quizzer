<?php 
require'config.php';
try{
	$conn = new PDO($config['DNS'], $config['username'], $config['password']);
	$conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
	// echo "connection Success";
}catch(PDOException $e){
	 echo 'ERROR: '. $e->getmessage();
}


 ?>