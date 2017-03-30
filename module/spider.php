<?php function spider($db){
		if (isset($_SESSION['user_code'])) {
			$code = $_SESSION['user_code'];
			if (!mysqli_fetch_array(mysqli_query($db,"SELECT * FROM user WHERE code = '$code'"))) {
				session_destroy();
			}
			$userId = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM user WHERE code = '$code' "))[0];
			if ($arr = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM user_info WHERE user = '$userId' "))) {
				$user = $userId;
				$ip = $_SERVER['REMOTE_ADDR'];
				$browser = $_SERVER['HTTP_USER_AGENT'];
				$lost = date("Y-m-d/H:i:s");
				mysqli_query($db,"UPDATE user_info SET ip='$ip',browser='$browser',lost_visited='$lost' WHERE user ='$user' ");
			}
			else
			{
				$user = $userId;
				$ip = $_SERVER['REMOTE_ADDR'];
				$browser = $_SERVER['HTTP_USER_AGENT'];
				$lost = date("Y-m-d/H:i:s");
				mysqli_query($db,"INSERT INTO user_info (id, browser, ip ,lost_visited,user) VALUES (NULL, '$browser', '$ip','$lost','$user')");
			}
		}
	} ?>