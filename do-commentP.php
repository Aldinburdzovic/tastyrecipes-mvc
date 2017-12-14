<?php

//include 'classes/Controller/Controller.php';
//use Controller\Controller;
session_start();
    
    require 'Comment.php';
    include 'classes/integration/dbhandler.inc.php';


    /*if(isset($_POST['commentSubmit'])){*/
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        
        $sql = "INSERT INTO comments2 (uid, date, message) VALUES ('$uid', '$date', '$message')";
        $result = $conn->query($sql);
        
       // $contr = new Controller();
	//$contr->setCommentM($uid, $date, $message);
        
        
    
    
    $sql = "SELECT * FROM comments2";
    $result = $conn->query($sql);
    
    $array = array();
    
    while($row = $result->fetch_assoc()){
    
        $id = $row['uid'];   
        $sql2 = "SELECT * FROM users WHERE user_id='$id'";
        $result2 = $conn->query($sql2);
        if($row2 = $result2->fetch_assoc()){
            
            $comment = new Comment($row2['user_uid'], $row['date'], $row['message'], false, $row['cid']);
                if(isset($_SESSION['u_id'])){ 
                if($_SESSION['u_id'] == $row2['user_id']){
                    $comment = new Comment($row2['user_uid'], $row['date'], $row['message'], true, $row['cid']);
                    }
            }
                }
                
          
        $array[] = $comment;
        
    }
    echo json_encode($array);
        
        
    /*}
    else{
        header("Location: resources/views/meatballs.php?comment=error");
	exit();
    }*/

