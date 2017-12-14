<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

include_once 'classes/Integration/DBH.php';
use Integration\DBH;

/**
 * Description of Comments
 *
 * @author Aldin
 */
class Comments {
    //put your code here
    
    public function setComM($uid, $date, $message) {
        include '../integration/dbhandler.inc.php';
        
        $DBH = new DBH();
        $result = $DBH->setComment($uid, $date, $message, $conn);
       
        
        //header("Location: resources/views/meatballs.php?comment=success");
	exit();
    }
    public function setComP($uid, $date, $message) {
        include '../integration/dbhandler.inc.php';
        
        $DBH = new DBH();
        $result = $DBH->setCommentP($uid, $date, $message, $conn);
       
        
        //header("Location: resources/views/pancakes.php?comment=success");
	exit();
    }
    
    

}
