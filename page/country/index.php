<?php session_start();
	  include "../../module/function.php";
	  include "../../module/header.php";
	  include "../../module/show_country.php";
	  include "../../module/shower_coins.php";
	  include "../../module/colection.php";
	  include "../../module/footer.php";;
	  include "../../config.ini";
	  $db = connect_db($hostName,$hostLogin,$hostPass,$dbName);
	  $idCountry = $_GET['country'];
	  $userId = NULL;
	  if (!isset($_SESSION['user_code']) || !mysqli_fetch_array(mysqli_query($db,"SELECT * FROM country WHERE id='$idCountry'"))) {
	  	refresh($siteName);
	  }
	  else
	  {
	  	 $codeUser = $_SESSION['user_code'];
	  	$userId = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM user WHERE code = '$codeUser'"))[0];
	  }
	  if (isset($_GET['add_coin'])) {
	  	$userId = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM user WHERE code = '$codeUser'"))[0];
	  	 $add_coin = sql_save($_GET['add_coin']);
		  if (mysqli_fetch_array(mysqli_query($db,"SELECT * FROM coins WHERE id='$add_coin'"))) {
		 	add_coin($add_coin,$userId,$db);
		  }
	  }
	   if (isset($_GET['rem_coin'])) {
	  	$userId = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM user WHERE code = '$codeUser'"))[0];
	  	 $rem_coin = sql_save($_GET['rem_coin']);
		  if (mysqli_fetch_array(mysqli_query($db,"SELECT * FROM coins WHERE id='$rem_coin'"))) {
		 	remove_coin($rem_coin,$userId,$db);
		  }
	  }

 ?>
 <?php get_header(mysqli_fetch_array(mysqli_query($db,"SELECT * FROM country WHERE id='$idCountry'"))[2],$siteName);?>
 <section>
 	<div class="container">
 		<div class="listCoinShower">
 		 <?php 	shower_coins(sql_save($idCountry),false,$db,$userId);  ?>
 		</div>
 	</div>
 </section>
<?php get_footer(); ?>
