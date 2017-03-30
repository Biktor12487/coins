<?php function add_year($name,$db){
		mysqli_query($db,"INSERT INTO year (id,name) VALUES (NULL, '$name')");
	} ?>