<?php 
ini_set('display_errors','On');
function sql_save($str = NULL){
	// Забезпечує цілісність  sql запиту захищаючи його від SQL інєкцій
	return str_replace(['"',"'"], "", $str);
}
function refresh($url = NULL){
	if ($url != NULL) {
		header("Location:".$url);
	}
	else
	{
		header("Refresh:0");
	}
}
function connect_db($host,$user,$pass,$db){
	// Забезпечує зєднання з DB
	if ($db = mysqli_connect($host,$user,$pass,$db)) {
			mysqli_query ($db,"set_client='utf8'");
			mysqli_query ($db,"set character_set_results='utf8'");
			mysqli_query ($db,"set collation_connection='utf8_general_ci'");
			mysqli_query ($db,"SET NAMES utf8");
		return $db;
	}
	else
	{
		error_log("Problem connect DATA BASE");
		exit();
	}
}
function country($id){
			// Повератає країну монети
			$query = mysql_query("SELECT * FROM country WHERE id='$id'");
			return mysql_fetch_array($query)[1];
}
function sender_mail($mail,$subject,$text){
	$to  = $mail; 

	$subject = $subject; 

	$message = $text; 

	$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: Admin <admin@coin.com>\r\n"; 
	$headers .= "Bcc: birthday-archive@example.com\r\n"; 

	mail($to, $subject, $message, $headers);
}
function loadImg($file_name,$dirImg){
	$uploaddir = "../../bank_img/".$dirImg;
	$uploadfile = $uploaddir . md5(time()) . basename($_FILES[$file_name]['name']);
	if (move_uploaded_file($_FILES[$file_name]['tmp_name'], $uploadfile)) {

	} else {
	 	return;
	}
	return $uploadfile;
}
 ?>