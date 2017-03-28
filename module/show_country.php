<?php 
	function show_list_country($db){
		$query = mysqli_query($db,"SELECT* FROM country");
		while ($row = mysqli_fetch_array($query)) {
			$id_country = $row[0];
			$count = mysqli_num_rows(mysqli_query($db,"SELECT * FROM coins WHERE country='$id_country'"));
			echo '<a href=""><div class="cardCountry">
				<h2>'.$row[2].'</h2>
				<img src="bank_img/country_icon/'.$row[1].'" alt="">
				<span>'.$count.'</span>
			</div></a>';
		}
	}
 ?>