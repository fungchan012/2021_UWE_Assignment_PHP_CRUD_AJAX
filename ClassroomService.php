<?php


include_once('RESTfulInterface.php');

class ClassroomService implements RESTfulInterface {
	
	function restGet($urlSegments) {
		echo 'Classroom::Get';
	}
	
	function restPut($urlSegments) {
	}
	
	function restPost($urlSegments) {
	}
	
	function restDelete($urlSegments) {
	}
	
}