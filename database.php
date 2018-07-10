<?php
//connect to mysql
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//create mysqli object
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//test connection
if(mysqli_connect_errno()) {
	echo "failed to connect";
}

?>

