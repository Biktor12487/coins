<?php include "../../module/function.php";
	  include "../../module/header.php";
	  include "../../module/show_country.php";
	    include "../../module/shower_coins.php";
	  include "../../config.ini";
	  $db = connect_db($hostName,$hostLogin,$hostPass,$dbName);
	  $idYear = $_GET['year'];
 ?>
 <?php get_header(mysqli_fetch_array(mysqli_query($db,"SELECT * FROM country WHERE id='$idYear'"))[2],$siteName);?>
 <section>
 	<div class="container">
 		<div class="listCoinShower">
 		 <?php 	shower_coins(false,sql_save($idYear),$db);  ?>
 		</div>
 	</div>
 </section>
