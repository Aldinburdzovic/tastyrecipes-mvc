<?php


namespace Model;
/**
 * Description of login
 *
 * @author Aldin
 */
include 'classes/Integration/DBH.php';
use Integration\DBH;

class User {
    //put your code here
    
    public function loginUser($uid, $pwd) {
        //session_start();
        include '../integration/dbhandler.inc.php';
        //Error handlers
	//Check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		header("Location: resources/views/home.php?login=empty");
		exit();
	} else {
                $DBH = new DBH();
		$result = $DBH->getUser($uid, $conn);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: resources/views/home.php?login=error1");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if ($hashedPwdCheck == false) {
					header("Location: resources/views/home.php?login=error");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					header("Location: resources/views/home.php?login=success");
					exit();
				}
			}
		}
	}
    }
    
    public function signinUser($first, $last, $email, $uid, $pwd) {
        
        include '../integration/dbhandler.inc.php';
        //Error handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
		header("Location: resources/views/signup.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			header("Location: resources/views/signup.php?signup=invalid");
			exit();
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: resources/views/signup.php?signup=email");
				exit();
			} else {
                                $DBH = new DBH();
                                $result = $DBH->getUser2($uid, $conn);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: resources/views/signup.php?signup=usertaken");
					exit();
				} else {
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
                                        
                                        $DBH = new DBH();
					$DBH->insertUser($first, $last, $email, $uid, $hashedPwd, $conn);
                                        
					header("Location: resources/views/signup.php?signup=success");
					exit();
				}
			}
		}
	}
    }
    public function logoutUser() {
        session_start();
	session_unset();
	session_destroy();
	header("Location: resources/views/home.php?logout=success");
	exit();
    }
}
