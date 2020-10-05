<?php
ob_start();
include('/var/www/html/php-login/config/db.php'); # Database connection

global $wrongPwError, $nonExistingAccError, $userPwError, $emptyUserError, $emptyPwError;

if(isset($_POST['login'])){
    if((!empty($_POST['username_signin'])) && !empty($_POST['password_signin'])) {
	if($stmt = $connection -> prepare('SELECT password FROM user WHERE username = ?')){
	    echo "hello";
	    $stmt -> bind_param('s', $_POST['username_signin']);
	    $stmt -> execute();
	    $stmt -> store_result();
	    if($stmt->num_rows>0){
		echo "therE";
		$stmt -> bind_result($password);
		$stmt -> fetch();
		if(password_verify($_POST['password_signin'], $password)){
		    session_regenerate_id();
		    $_SESSION['username']=$_POST['username_signin'];
		    header("Location: /php-login/src/dashboard.php");
		}
	    }
	    
	    $stmt -> close();
	}
    } else{
	if(empty($_POST['username_signin'])){
	    $emptyUserError = '<div class = "alert alert-danger">
	Username is not provided.
				       </div>';
	}
	if(empty($_POST['password_signin'])){
	    $emptyPwError = '<div class = "alert alert-danger">
	Password is not provided.
				      </div>';
	}
    }
}
?>
