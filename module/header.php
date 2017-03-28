<?php 
	function get_header($page_name = "Default",$siteName = NULL){
		echo '<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" href="'.$siteName.'css/style.css">
			<title>'.$page_name.'</title>
		</head>
		<body>';
	}
 ?>