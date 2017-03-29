<?php 
	function get_header($page_name = "Default",$siteName = NULL){
		echo '<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" href="'.$siteName.'css/style.css">
			<link rel="stylesheet" href="'.$siteName.'awesome/css/font-awesome.min.css">
			<title>'.$page_name.'</title>
		</head>
		<body>';
	}
 ?>