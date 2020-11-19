<?php
include('/var/www/html/php-login/db.php'); # Database connection

# Error and success messages
global $successMsg, $accountExists, $_unameError, $_emailError, $pwError;
global $emailEmptyError, $unameEmptyError, $pwEmptyError;

if(isset($_POST["signup"])){
    if(!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])){
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	    $_emailError = '<div class = "alert alert-danger">
	Email format is invalid.
				    </div>';

	}
	if(preg_match('/[A-Za-z0-9]+/', $_POST['username'])==0) {
	    $_unameError = '<div class = "alert alert-danger">
	Only letters and numbers are allowed.
	</div>';
	}
	if(preg_match('/[A-Za-z0-9]+/', $_POST['password'])==0) {
	    $pwError = '<div class = "alert alert-danger">
	Only letters and numbers are allowed.
	</div>';
	}
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !(preg_match('/[A-Za-z0-9]+/', $_POST['username'])==0) && !(preg_match('/[A-Za-z0-9]+/', $_POST['password'])==0)){
	    if($stmt = $connection -> prepare("SELECT password FROM user WHERE email = ?")) { # Checks if account with that username and email exists
		$stmt -> bind_param("s", $_POST['email']);
		$stmt -> execute();
		$stmt -> store_result();
		if($stmt -> num_rows>0){
		    $accountExists = '<div class = "alert alert-danger">
		Account with username and email already exists.
					      </div>';
		} else { # Account doesn't exist yet
		    if($stmt = $connection -> prepare("INSERT INTO user (username, password, email) VALUES (?,?,?)")){
			$pass_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
			$stmt -> bind_param("sss", $_POST['username'], $pass_hash, $_POST['email']);
			$stmt -> execute();

			$successMsg = '<div class = "alert alert-success">
		    Sign up success. You may now login.
						</div>';
		    }
		}
		$stmt -> close();
	    }
	}
    }else {
	    if(empty($_POST['email'])) {
		$emailEmptyError = '<div class="alert alert-danger">
                     Email can not be blank.
                </div>';
	    }
	    if(empty($_POST['username'])){
		$unameEmptyError = '<div class = "alert alert-danger">
	    Username cannot be blank.
</div>';
	    }
	    if(empty($_POST['password'])){
		$pwEmptyError = ' <div class = "alert alert-danger">
	    Password cannot be blank.
					   </div>';
	    }
    }
    $connection->close();
}
?>
