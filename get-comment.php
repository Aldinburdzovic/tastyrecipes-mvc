<?php
    session_start();
    
    require 'Comment.php';
    include 'classes/integration/dbhandler.inc.php';
    
    
    $sql = "SELECT * FROM comments";
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
    
    
   