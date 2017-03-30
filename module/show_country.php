<?php 
	function show_list_country($db){
		$query = mysqli_query($db,"SELECT* FROM country");
		while ($row = mysqli_fetch_array($query)) {
			$id_country = $row[0];
			$count = mysqli_num_rows(mysqli_query($db,"SELECT * FROM coins WHERE country='$id_country'"));
			echo '<a href="page/country/index.php?country='.$row[0].'"><div class="cardCountry">
				<img src="bank_img/country_icon/'.$row[1].'" alt="">
				<h2>'.$row[2].'</h2>
				<span>'.$count.'</span>
			</div></a>';
		}
	}
	function show_list_year($db){
		$query = mysqli_query($db,"SELECT* FROM year");
		while ($row = mysqli_fetch_array($query)) {
			$id_year = $row[0];
			$count = mysqli_num_rows(mysqli_query($db,"SELECT * FROM coins WHERE year='$id_year'"));
			echo '<a href="page/year/index.php?year='.$row[0].'"><div class="cardCountry">
				<img src="images/year_icon.png" alt="">
				<h2>'.$row[1].'</h2>
				<span>'.$count.'</span>
			</div></a>';
		}
	}
 ?>