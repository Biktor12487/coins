<?php
session_start();
 	  include "../../module/function.php";
	  include "../../module/header.php";
	  include "../../module/footer.php";
	  include "../../module/show_country.php";
	  include "../../config.ini";
	  include "../../module/log_reg.php";
	  include "../../module/coin_node.php";
	  $db = connect_db($hostName,$hostLogin,$hostPass,$dbName);
	  if (!isset($_GET['coin'])) {
	  	refresh($siteName);
	  }
	  else
	  {
	  	 $idCoin = $_GET['coin'];
	  }
	  $coinName = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM coins WHERE id='$idCoin'"))[2];
 ?>
 <?php get_header($coinName,$siteName) ?>
 <section>
 	<div class="container">
 		<div class="nodeCoin">
 			<?php coin_node($idCoin,$db); ?>
 		</div>
 	</div>
 </section>
 <?php get_footer(); ?>