<?php 
	function shower_coins($country = NULL, $year = NULL,$db){
		if (isset($country) && $year == false) {
			$query =  mysqli_query($db,"SELECT * FROM coins WHERE country = $country");
				while ($row = mysqli_fetch_array($query)) {
				$year_id  = $row[5];
				$year = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM year WHERE id='$year_id'"))[1];
				echo '<a href="../coin/index.php?coin='.$row[0].'"><div class="cardCoins">
					<img src="../../bank_img/coins_img/'.$row[1].'" alt="">
					<h5>'.$row[2].'</h5>
					<span>Рік: <b>'.$year.'</b></span>
				</div></a>';
			}
		}
		else if (isset($year) && $country == false )
		{
			$query =  mysqli_query($db,"SELECT * FROM coins WHERE year = $year");
				while ($row = mysqli_fetch_array($query)) {
				$year_id  = $row[5];
				$year = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM year WHERE id='$year_id'"))[1];
				echo '<a href="../coin/index.php?coin='.$row[0].'"><div class="cardCoins">
					<img src="../../bank_img/coins_img/'.$row[1].'" alt="">
					<h5>'.$row[3].'</h5>
					<span>Рік: <b>'.$year.'</b></span>
				</div></a>';
			}
		}

		
	}
 ?>