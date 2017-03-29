<?php
session_start();
 	  include "../../module/function.php";
	  include "../../module/header.php";
	  include "../../module/footer.php";
	  include "../../module/show_country.php";
	  include "../../config.ini";
	  include "../../module/log_reg.php";
	  $db = connect_db($hostName,$hostLogin,$hostPass,$dbName);
	  $idCoin = $_GET['coin'];
	  $coinName = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM coins WHERE id='$idCoin'"))[2]
 ?>
 <?php get_header($coinName,$siteName) ?>
 <section>
 	<div class="container">
 		<div class="nodeCoin">
 			
 		</div>
 	</div>
 </section>