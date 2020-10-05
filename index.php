<?php include('/var/www/html/php-login/controllers/login.php'); ?>
<!doctype html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

	<title>PHP Login System Test!</title>
	<!-- JQuery + Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <body>
	<div class="App">
            <div class="vertical-center">
		<div class="inner-block">
                    <form action="" method="post">
			<h3>Login</h3>
			<?php echo $emptyUserError; ?>
			<?php echo $emptyPwError; ?>
			<div class="form-group">
                            <label>Username</label>
                            <input type="Username" class="form-control" name="username_signin" id="username_signin" />
			</div>

			<div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password_signin" id="password_signin" />
			</div>

			<button type="submit" name="login" id="sign_in"
				      class="btn btn-outline-primary btn-lg btn-block">Sign in
			</button>
			<a class ="btn btn-outline-primary btn-lg btn-block" href="/php-login/src/signup.php"> Sign up
			</a>
                    </form>
		</div>
            </div>
	</div>
    </body>
</html>
