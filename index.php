<?php
session_start();
 include "module/function.php";
	  include "module/header.php";
	  include "module/show_country.php";
	  include "config.ini";
	  include "module/log_reg.php";
	  $db = connect_db($hostName,$hostLogin,$hostPass,$dbName);
 ?>
 <?php get_header("Головна",$siteName) ?>
 <section>
 	<div class="container">
 		<?php if (!isset($_SESSION['user_code'])) {
 			if(log_reg($db) == true){
 				refresh($siteName);
 			};
 		}
 		else{
 			echo '<a href="?exit">Вихід з аккаунту</a>';
	 			if (isset($_GET["exit"])) {
	 				$_SESSION['user_code'] = NULL;
	 				refresh($siteName);
	 			}
 			} ?>
 	</div>
 </section>
<section>
	<div class="container">
		<div class="sortPanel">
			<a href="?country_sort">За країнами</a>
			<a href="?year_sort">За роками</a>
		</div>
		<div class="listCountryCards">
			<?php if (isset($_GET["year_sort"])) {
				show_list_year($db);
			}
			else{
				show_list_country($db);
				} ?>
		</div>
	</div>
</section>