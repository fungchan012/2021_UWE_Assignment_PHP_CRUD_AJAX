<?php
interface RESTfulInterface {
	public function restGet($urlSegments);		// Read
	public function restPut($urlSegments);		// update
	public function restPost($urlSegments);		// create
	public function restDelete($urlSegments);	// delete
}
