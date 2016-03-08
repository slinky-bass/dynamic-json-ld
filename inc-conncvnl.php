<?php 
$vmysqlserver = 'localhost';
$vconnusername = 'webportf_Daniell';
$vconnpassword = 'Daniell';
$vconndb = 'webportf_Danielle';


// CONNECT TO MYSQL SERVER
$vconncvnl = mysqli_connect($vmysqlserver, $vconnusername, $vconnpassword, $vconndb);

if (!$vconncvnl) {
	
	//REDIRECT TO ERROR PAGE WHEN CONNECION FAILS
	echo "Connection Failed";
	exit();
	
	}else{
		
		//INDICATE WHICH DATABASE YOU WANT TO WORK WITH
		mysqli_select_db($vconncvnl, $vconndb);
}
?>