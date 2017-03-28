<?php include "../../module/function.php";
	  include "../../module/header.php";
	   include "../../module/add_country.php";
	   include "../../module/list_country.php";
	  include "../../config.ini";
	  $db = connect_db($hostName,$hostLogin,$hostPass,$dbName);


	if (isset($_POST['add_country'])) {
		$name =$_POST['name_country'];
 		add_country("img_country",$name,$db);
 		refresh($siteName.'page/admin/');
 	} 
 	if (isset($_GET['del_country'])) {
 		$id = $_GET['del_country'];
 		del_country($id,$db);
 		refresh($siteName.'page/admin/');
 	}
?>
 <?php get_header("Адмін панель",$siteName); ?>
 <section>
 	<div class="container">
 		<div class="wrap-add-country">
 			<h2 class="title">Додати країну</h2>
 			<form action="" method="post"  enctype="multipart/form-data">
 				<input type="file" name="img_country" accept="image/jpg, image/JPG,image/JPEG, image/jpeg" >
 				<input type="text" name="name_country" placeholder="Назва країни">
 				<input type="submit" name='add_country' value="Додати">
 			</form>
 			<h2 class="title">Список країн</h2>
 			<div class="listCountry">
 				<?php list_Country($db); ?>
 			</div>
 		</div>
 	</div>
 </section>
