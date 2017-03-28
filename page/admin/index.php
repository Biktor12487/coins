<?php include "../../module/function.php";
	  include "../../module/header.php";
	   include "../../module/add_country.php";
	   include "../../module/list_country.php";
	   include "../../module/coin_add.php";
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
 	if (isset($_POST['add_coin'])) {
 		$title = $_POST['title_coin'];
 		$about = $_POST['about_coin'];
 		$year = $_POST['year_coin'];
 		$country = $_POST['country_coin'];
 		add_coins("img_coin",$title,$about,$year,$country,$db);
 		refresh($siteName.'page/admin/');
 	}
 	if (isset($_GET['del_coin'])) {
 		$id = sql_save($_GET['del_coin']);
 		del_coin($id,$db);
 		refresh($siteName.'page/admin/');
 	}
?>
 <?php get_header("Адмін панель",$siteName); ?>
 <section>
 	<div class="container">
 		<div class="wrap-add-country">
 			<h2 class="title">Додати країну</h2>
 			<form action="" method="post"  enctype="multipart/form-data">
 				<input type="file" name="img_country" accept="image/jpg, image/JPG,image/JPEG, image/jpeg" required>
 				<input type="text" name="name_country" placeholder="Назва країни" required>
 				<input type="submit" name='add_country' value="Додати">
 			</form>
 			<h2 class="title">Список країн</h2>
 			<div class="listCountry">
 				<?php list_Country($db); ?>
 			</div>
 		</div>
 	</div>
 </section>
 <section>
 	<div class="container">
 		<div class="wrap-coins">
 			<h2 class="title">Монети</h2>
 			<div class="addCoins">
 				<form action="" method="post"  enctype="multipart/form-data">
 					<input type="file" name="img_coin" accept="image/jpg, image/JPG,image/JPEG, image/jpeg"  required>
 					<input type="text" name="title_coin" placeholder="Назва Монети" required>
 					<textarea name="about_coin" id="" cols="30" rows="10" placeholder="Про монету" required></textarea>
 					<select name="year_coin" id="" required>
 						<?php list_year_coins($db); ?>
 					</select>
 					<select name="country_coin" id="" required>
 						<?php list_country_coins($db); ?>
 					</select>
 					<input type="submit" value="Додати монету" name="add_coin">
 				</form>
 			</div>
 			<?php if (isset($_GET['edit_coin'])) {
 				$id = $_GET['edit_coin'];
 				edit_coin($id,$db);
 			} ?>
 			<div class="topPanelListCoin">
 				<span>Зображення</span>
 				<span>Заголовок</span>
 				<span>Рік</span>
 				<span>Країна</span>
 				<span>Видалити</span>
 				<span>Редагувати</span>
 			</div>
 			<div class="listCoins">
 				<?php list_coins($db); ?>
 			</div>
 		</div>
 	</div>
 </section>
