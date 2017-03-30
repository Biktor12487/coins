<?php 
	function add_coin($id,$user,$db){
		if (!mysqli_fetch_array(mysqli_query($db,"SELECT * FROM colections WHERE user='$user' AND coin='$id'"))) {
			$query = mysqli_query($db,"INSERT INTO colections (id, user, coin) VALUES (NULL, '$user', '$id')");
		}
	}
	function remove_coin($id,$user,$db){
		if (mysqli_fetch_array(mysqli_query($db,"SELECT * FROM colections WHERE user='$user' AND coin='$id'"))) {
			$query = mysqli_query($db,"DELETE FROM colections WHERE user ='$user' AND coin='$id'");
		}
	}
 ?>