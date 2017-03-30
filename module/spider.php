<?php function spider($db){
		if (isset($_SESSION['user_code'])) {
			$code = $_SESSION['user_code'];
			if (!mysqli_fetch_array(mysqli_query($db,"SELECT * FROM user WHERE code = '$code'"))) {
				session_destroy();
			}
		}
	} ?>