<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$banco = 'bancovaralsolidario';
	
	$link = mysql_connect($host, $user, $pass); 

	if($link){
		mysql_select_db($banco);
	}
?>