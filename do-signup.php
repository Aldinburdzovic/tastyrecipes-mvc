<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

    include 'classes/Controller/Controller.php';
use Controller\Controller;

if (isset($_POST['submit'])) {
	
include 'classes/integration/dbhandler.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	$contr = new Controller();
	$contr->signup($first, $last, $email, $uid, $pwd);
} else {
	header("Location: resources/views/signup.php");
	exit();
}
