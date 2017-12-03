<?php


namespace Controller;
include 'classes/Model/User.php';
include 'classes/Model/Comments.php';
include '../../classes/Inegration/DBH.php';
use Model\User;
use Model\Comments;
use Integration\DBH;
/**
 * Description of Controller
 *
 * @author Aldin
 */
class Controller {
    //put your code here
    
    
    
    public function login($username, $pwd) {
        $user = new User();
        $user->loginUser($username, $pwd);
    }
    
    public function signup($first, $last, $email, $uid, $pwd) {
        $user = new User();
        $user->signinUser($first, $last, $email, $uid, $pwd);
    }
    public function setCommentM($uid, $date, $message) {
        $comment = new Comments();
        $comment->setComM($uid, $date, $message);
    }
    public function setCommentP($uid, $date, $message) {
        $comment = new Comments();
        $comment->setComP($uid, $date, $message);
    }
    
    public function logout() {
        $user = new User();
        $user->logoutUser();
    }
}
