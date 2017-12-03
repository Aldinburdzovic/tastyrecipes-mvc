<?php



include 'classes/Controller/Controller.php';

use Controller\Controller;

if (isset($_POST['submit'])) {
	
    $contr = new Controller();
	$contr->logout();
}