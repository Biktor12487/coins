<?php include "module/function.php";
	  include "module/header.php";
	  include "module/show_country.php";
	  include "config.ini";
	  $db = connect_db($hostName,$hostLogin,$hostPass,$dbName);
 ?>
 <?php get_header("Головна",$siteName) ?>
<section>
	<div class="container">
		<div class="listCountryCards">
			<?php show_list_country($db) ?>
		</div>
	</div>
</section>