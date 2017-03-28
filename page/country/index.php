<?php include "../../module/function.php";
	  include "../../module/header.php";
	  include "../../module/show_country.php";
	    include "../../module/shower_coins.php";
	  include "../../config.ini";
	  $db = connect_db($hostName,$hostLogin,$hostPass,$dbName);
	  $idCountry = $_GET['country'];
 ?>
 <?php get_header(mysqli_fetch_array(mysqli_query($db,"SELECT * FROM country WHERE id='$idCountry'"))[2],$siteName);?>
 <section>
 	<div class="container">
 		<div class="listCoinShower">
 		 <?php 	shower_coins(sql_save($idCountry),false,$db);  ?>
 		</div>
 	</div>
 </section>
