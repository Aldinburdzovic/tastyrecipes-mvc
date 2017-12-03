<?php

include 'classes/Controller/Controller.php';
use Controller\Controller;


    if(isset($_POST['commentSubmit'])){
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        
        $contr = new Controller();
	$contr->setCommentM($uid, $date, $message);
        
        
    }
    else{
        header("Location: resources/views/meatballs.php?comment=error");
	exit();
    }

