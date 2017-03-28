<?php function add_country($img,$name,$db){
		$imgLink = loadImg($img,'country_icon/');
		mysqli_query($db,"INSERT INTO country (id, img, `name`) VALUES (NULL, '$imgLink', '$name')");
	} ?>