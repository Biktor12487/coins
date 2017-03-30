<?php
session_start();
 include "module/function.php";
	  include "module/header.php";
	  include "module/footer.php";
	  include "module/show_country.php";
	  include "config.ini";
	  include "module/log_reg.php";
	  include "module/spider.php";
	  $db = connect_db($hostName,$hostLogin,$hostPass,$dbName);
	  spider($db);
 ?>
 <?php get_header("Головна",$siteName) ?>
 <section class="section_header">
 	<div class="container">
 		<div class="header">
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
			<div class="rightSectorHeader">
				<h1>Lorem Ipsum Ameet Lorem Ipsum Ameet Lorem Ipsum Ameet</h1>
				<hr>
				<ul>
					<li>Any One</li>
					<li>Any Two</li>
					<li>Any Three</li>
				</ul>
			</div>
 		</div>
 	</div>
 </section>
 <section class="sector_change_sort">
 	<div class="container">
 		<div class="sortPanel">
			<a href="?country_sort">За країнами</a>
			<a href="?year_sort">За роками</a>
		</div>
 	</div>
 </section>
<section class="sector_card_nav">
	<div class="container">
		<div class="listCountryCards">
			<?php if (isset($_GET["year_sort"])) {
				show_list_year($db);
			}
			else{
				show_list_country($db);
				} 
				?>
		</div>
	</div>
</section>
<?php get_footer(); ?>