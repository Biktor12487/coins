<?php 
	function shower_coins($country = NULL, $year = NULL,$db,$userId){
		if (isset($country) && $year == false) {
			$query =  mysqli_query($db,"SELECT * FROM coins WHERE country = $country");
				while ($row = mysqli_fetch_array($query)) {
				$year_id  = $row[5];
				$year = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM year WHERE id='$year_id'"))[1];
				echo '<a href="../coin/index.php?coin='.$row[0].'"><div class="cardCoins">
					<img src="../../bank_img/coins_img/'.$row[1].'" alt="">
					<h5>'.$row[2].'</h5>
					<span>Рік: <b>'.$year.'</b></span>';
						$coinId = $row[0];
						if (!mysqli_fetch_array(mysqli_query($db,"SELECT * FROM colections WHERE coin ='$coinId' AND user = '$userId'"))) {
								echo '<form action="" method="get">
						<input style="display:none" type="text" name="country" value='.$_GET['country'].'>
						<input style="display:none" type="text" name="add_coin" value='.$row[0].'>
						<input type="submit" value="Додати">
						</form></div> </a>';
						}
						else
						{
								echo '<form action="" method="get">
						<input style="display:none" type="text" name="country" value='.$_GET['country'].'>
						<input style="display:none" type="text" name="rem_coin" value='.$row[0].'>
						<input type="submit" value="Вилучити">
						</form></div> </a>';
						}
			}
		}
		else if (isset($year) && $country == false )
		{
			$query =  mysqli_query($db,"SELECT * FROM coins WHERE year = $year");
				while ($row = mysqli_fetch_array($query)) {
				$country_id  = $row[4];
				$country = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM country WHERE id='$country_id'"))[2];
				echo '<a href="../coin/index.php?coin='.$row[0].'"><div class="cardCoins">
					<img src="../../bank_img/coins_img/'.$row[1].'" alt="">
					<h5>'.$row[2].'</h5>
					<span>Країна: <b>'.$country.'</b></span>';
						$coinId = $row[0];
						if (!mysqli_fetch_array(mysqli_query($db,"SELECT * FROM colections WHERE coin ='$coinId' AND user = '$userId'"))) {
								echo '<form action="" method="get">
						<input style="display:none" type="text" name="year" value='.$_GET['year'].'>
						<input style="display:none" type="text" name="add_coin" value='.$row[0].'>
						<input type="submit" value="Додати">
						</form></div> </a>';
						}
						else
						{
								echo '<form action="" method="get">
						<input style="display:none" type="text" name="year" value='.$_GET['year'].'>
						<input style="display:none" type="text" name="rem_coin" value='.$row[0].'>
						<input type="submit" value="Вилучити">
						</form></div> </a>';
						}
			}
		}

		
	}
 ?>