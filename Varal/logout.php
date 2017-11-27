<?php
	session_start();
	session_destroy(); 
	header("Location:login.php");

	unset ($_SESSION['email']);
	unset ($_SESSION['senha']);
?>