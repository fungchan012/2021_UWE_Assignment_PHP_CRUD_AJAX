<?php

class BookingService {
	// http://localhost/SampleUI/index.php/booking/district/Yuen Long
	function restGet($params) {
		$type = array_shift($params);
		// echo "$type";
		if ($type==='district') {
			// search bookings in a campus
			$type = array_shift($params);
			//echo "$district";
			require_once 'newdb.php';
			$resultArray = array();
			$sql = "SELECT * FROM bbq WHERE district='$type'";
			if ($dbresult=$conn->query($sql)) {
				// records retrieved
				while ( $row=$dbresult->fetch_object()  ) {
					$record = array();
					$record['id'] = $row->id;
					$record['district'] = $row->district;
					$record['name'] = $row->name;
					$record['address'] = $row->address;
					$resultArray[] = $record;
				}
				echo json_encode($resultArray);
				//echo "$resultArray";
			} else {
				$arr = array();
				$arr["status"] = "error";
				$arr["errcode"] = "102";
				$arr["errmsg"] = "SQL failed to read a record";
				echo json_encode($arr);
				exit;
			}			
		}  
	}
	
	// http://localhost/SampleUI/index.php/booking/createRecord/Yuen Long/TEST/TEST
	function restPost($params) {
		$type = array_shift($params);
		if ($type==='createRecord') {
			$district = array_shift($params);
			$name = array_shift($params);
			$address = array_shift($params);
			require_once 'newdb.php';
			$sql = "INSERT INTO bbq (district, name, address) VALUES ('$district', '$name', '$address')";
			if ($dbresult=$conn->query($sql)) {
				echo "create recorded\n";
				echo "$district\n";
				echo "$name\n";
				echo "$address\n";
				exit;
			} else {
				$arr = array();
				$arr["status"] = "error";
				$arr["errcode"] = "104";
				$arr["errmsg"] = "SQL failed to create a record";
				echo json_encode($arr);
				exit;
			}			
		}
	}
	
	// http://localhost/SampleUI/index.php/booking/updateRecord/1/Yuen Long/TEST/TEST
	function restPut($params) {
		$type = array_shift($params);
		if ($type==='updateRecord') {
			$id       = array_shift($params);
			$district = array_shift($params);
			$name     = array_shift($params);
			$address  = array_shift($params);
			require_once 'newdb.php';
			$sql = "UPDATE bbq SET district = '$district', name = '$name', address = '$address' WHERE id = '$id'";
			if ($dbresult=$conn->query($sql)) {
				echo "update recorded\n";
				echo "$id\n";
				echo "$district\n";
				echo "$name\n";
				echo "$address\n";
				exit;
			} else {
				$arr = array();
				$arr["status"] = "error";
				$arr["errcode"] = "103";
				$arr["errmsg"] = "SQL failed to update a record";
				echo json_encode($arr);
				exit;
			}
		}
	}

	// http://localhost/SampleUI/index.php/booking/deleteRecord/1
	function restDelete($params) {
		$type = array_shift($params);
		if ($type==='deleteRecord') {
			$type = array_shift($params);
			require_once 'newdb.php';
			$sql = "DELETE FROM bbq where id ='$type'";
			if ($dbresult=$conn->query($sql)) {
				echo "delete recorded";
				exit;
			} else {
				$arr = array();
				$arr["status"] = "error";
				$arr["errcode"] = "105";
				$arr["errmsg"] = "SQL failed to delete a record";
				echo json_encode($arr);
				exit;
			}			
		}
	}
}