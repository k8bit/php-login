<?php include('/var/www/html/php-login/db.php'); ?>
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

    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 25rem">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">User Profile</h5>
                    <p class="card-text">Username: <?php echo $_SESSION['username']; ?></p>
		    <form action="dashboard.php" method="post">
		    <button type="submit" name="initialize" id="initialize" class="btn btn-outline-primary  btn-block"> Initialize Database
		    </button>
		    </form>
		    
                    <a class="btn btn-danger btn-block" href="/php-login/logout.php">Log out</a>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>
