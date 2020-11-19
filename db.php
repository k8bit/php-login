<?php
ob_start(); # Enables the user of headers
if(!isset($_SESSION)){
    session_start();
}

function connect_db() {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);	
    $hostname='';
    $username='';
    $password='';
    $dbname='test';
    $connection = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.");
    return $connection;
}

#connect_db();


if(isset($_POST['initialize'])) {
    initialize();
}

function initialize(){
    $connection = connect_db();
    ini_set('display_errors', 1);
    error_reporting(E_ALL);	
    $query = '';
    $fileName = 'university.sql';
    $fh = file($fileName);

    $user = posix_getpwuid(posix_geteuid());
    var_dump($user);
    

    echo $fileName, file_exists($fileName) ? ' exists' : ' does not exist', "\n";
    echo $fileName, is_readable($fileName) ? ' is readable' : ' is NOT readable', "\n";
    echo $fileName, is_writable($fileName) ? ' is writable' : ' is NOT writable', "\n";
    if (!file_exists($fileName)) {
	print 'File not found!';
    } else if(!$fh) {
	print 'Can\'t open file';

    } else {
	foreach ($fh as $line)	{
	    $startWith = substr(trim($line), 0 ,2);
	    $endWith = substr(trim($line), -1 ,1);
	    
	    if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
		continue;
	    }
	    
	    $query = $query . $line;
	    if ($endWith == ';') {
		mysqli_query($connection,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
		$query= '';		
	    }
	}
    }
}
?>
