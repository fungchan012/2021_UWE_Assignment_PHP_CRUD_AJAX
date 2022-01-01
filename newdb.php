<?php
$server = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "bbq";

// localhost/SampleUI/db.php

$conn = new mysqli($server, $dbuser, $dbpassword, $dbname);

if ($conn->connect_error) {
	echo "database connection error";
	exit;
}
