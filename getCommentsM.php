

<?php
session_start();
    date_default_timezone_set('Europe/Stockholm');
    include 'classes/integration/dbhandler.inc.php';
    //echo "123 "; 
    if(isset($_POST['commentSubmit'])){
    getComments($conn);
    }
    if(isset($_POST['commentDelete'])){
    getComments($conn);
    }
    if(isset($_POST['loadCommentsOnce'])){
    getComments($conn);
    }
function getComments($conn){
    
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $id = $row['uid'];   
        $sql2 = "SELECT * FROM users WHERE user_id='$id'";
        $result2 = $conn->query($sql2);
        if($row2 = $result2->fetch_assoc()){
            echo"<div class='comment-box'><p><p class='user-date'>";
            echo $row2['user_uid']."<br></p>";
            echo $row['date']."<br>";
            echo nl2br($row['message']);
            echo "</p> "; 
            if(isset($_SESSION['u_id'])){ 
                if($_SESSION['u_id'] == $row2['user_id']){
                   echo "<form id='delete-form'>
                    <input type='hidden' name='cid' id='cid' value='".$row['cid']."'>
                    <button type='submit' onclick='delete' id='del-btn' name='commentDelete'>Delete</button>
                     </form>"; 
                }
            }
            
        echo "</div>";
        }
        
                
    }
    
}
function deleteComments($conn){
    if(isset($_POST['commentDelete'])){
        $cid = $_POST['cid'];
        $sql = "DELETE FROM comments WHERE cid='$cid'";
        $result = $conn->query($sql);
        //header("Location: meatballs.php");
    }
}





    
