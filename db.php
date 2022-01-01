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


// DROP TABLE IF EXISTS

$sql = "DROP TABLE IF EXISTS bbq";

if (!$result=$conn->query($sql)) {
	die ("failed to drop table");
}

// create table
$sql = "CREATE TABLE IF NOT EXISTS bbq (id INT AUTO_INCREMENT PRIMARY KEY, district text, name text, address text)";

if (!$result=$conn->query($sql)) {
	die ("database table creation failed");
}


$bbqFile = file_get_contents('https://api.data.gov.hk/v1/historical-archive/get-file?url=http%3A%2F%2Fwww.lcsd.gov.hk%2Fdatagovhk%2Ffacility%2Ffacility-bbqs.json&time=20211110-0936');

$decodedJson = json_decode($bbqFile, true);


foreach ($decodedJson as $bbqSite) {
	$id;
	$district 	= $bbqSite['District_en'];
	$name 		= $bbqSite['Name_en'];
	$address 	= $bbqSite['Address_en'];
	$name = str_replace("'", "", $name);
	$address = str_replace("(", "", $address);
	$address = str_replace(")", "", $address);
	// echo "$district, $name, $address <br>";	$type
	$sql = "INSERT INTO bbq (district, name, address) VALUES ('$district', '$name', '$address')";

	if (!$result=$conn->query($sql)) {
		die ("insertion failed");
	}
}