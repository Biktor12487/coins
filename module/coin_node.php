<?php 
	function coin_node($id,$db){
		$query = mysqli_query($db,"SELECT * FROM coins WHERE id='$id'");
		$row = mysqli_fetch_array($query);
		$yearId = $row[5];
		$year = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM year WHERE id='$yearId'"))[1];
		$countryId = $row[4];
		$country = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM country WHERE id='$countryId'"))[2];
		echo '<div class="nodeCoin">
			<img src="../../bank_img/coins_img/'.$row[1].'" alt="">
			<div class="aboutCoin">
				<h2>'.$row[2].'</h2>
				<div class="textCoin">
					'.$row[3].'
				</div>
				<div class="info">
					<span>Рік: <b>'.$year.'</b></span>
					<span>Країна: <b>'.$country.'</b></span>
				</div>
			</div>
		</div>';
	}
 ?>