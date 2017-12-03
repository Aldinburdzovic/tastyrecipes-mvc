<?php

namespace Integration;
/**
 * Description of DBH
 *
 * @author Aldin
 */
class DBH {
    //put your code here
    
    public function getUser($uid, $conn) {
        include 'dbhandler.inc.php';
        
        
        $sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    
    public function insertUser($first, $last, $email, $uid, $hashedPwd, $conn) {
        
        include 'dbhandler.inc.php';
        
        $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
        mysqli_query($conn, $sql);
    }
    
    public function getUser2($uid) {
        include 'dbhandler.inc.php';
        
        $sql = "SELECT * FROM users WHERE user_uid='$uid'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    
    public function setComment($uid, $date, $message, $conn) {
        include 'dbhandler.inc.php';
        
        $sql = "INSERT INTO comments (uid, date, message) VALUES ('$uid', '$date', '$message')";
        $result = $conn->query($sql);
    }
    public function setCommentP($uid, $date, $message, $conn) {
        include 'dbhandler.inc.php';
        
        $sql = "INSERT INTO comments2 (uid, date, message) VALUES ('$uid', '$date', '$message')";
        $result = $conn->query($sql);
    }
    
}
