<?php


session_start();

    include 'classes/Controller/Controller.php';
use Controller\Controller;

if (isset($_POST['submit'])) {
	
	include 'classes/integration/dbhandler.inc.php';

	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        
        $contr = new Controller();
	$contr->login($uid, $pwd);
        
} else {
	header("Location: resources/views/home.php?login=error");
	exit();
}