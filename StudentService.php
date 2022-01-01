<?php

include_once('RESTfulInterface.php');

class StudentService implements RESTfulInterface {
	
	function restGet($urlSegments) {
		echo 'Student::Get';
	}
	
	function restPut($urlSegments) {
		echo 'Student::Put';

	}
	
	function restPost($urlSegments) {
		echo 'Student::Post';
	}
	
	function restDelete($urlSegments) {
		echo 'Student::Delete';
	}
}
