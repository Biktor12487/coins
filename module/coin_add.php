<?php 
function list_year_coins($db){
	$list_html= "";
	$query = mysqli_query($db,"SELECT * FROM year");
	while ($row = mysqli_fetch_array($query)) {
			$list_html.='<option value="'.$row[0].'">'.$row[1].'</option>';
		}
		echo $list_html;
}
function list_country_coins($db){
	$list_html= "";
	$query = mysqli_query($db,"SELECT * FROM country");
	while ($row = mysqli_fetch_array($query)) {
		$list_html.='<option value="'.$row[0].'">'.$row[2].'</option>';
	}
	echo $list_html;
}
function add_coins($img,$title,$about,$year,$country,$db){
	$imgLink = loadImg($img,'coins_img/');
	mysqli_query($db,"INSERT INTO `coins` (`id`, `img`, `title`, `about`, `country`, `year`) VALUES (NULL, '$imgLink', '$title', '$about', '$country', '$year')");
}
function list_coins($db){
	$list_html = "";
	$query = mysqli_query($db,"SELECT * FROM coins");
	while ($row = mysqli_fetch_array($query)) {
		$year_id = $row[5];
		$country_id = $row[4];
		$year = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM year WHERE id='$year_id'"))[1];
		$country = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM country WHERE id='$country_id'"))[2];
		$list_html.= '<div class="rowCoin">
			<img src="../../bank_img/coins_img/'.$row[1].'" alt="">
			<h4>'.$row[2].'</h4>
			<span>'.$year.'</span>
			<span>'.$country.'</span>
			<a href="?del_coin='.$row[0].'">Видалити</a>
			<a href="?edit_coin='.$row[0].'">Редагувати</a>
		</div>';
	}
	echo $list_html;
}
function del_coin($id,$db){
	mysqli_query($db,"DELETE FROM `coins` WHERE id='$id'");
}
function edit_coin($id,$db){
	$query = mysqli_query($db,"SELECT * FROM coins WHERE id='$id'");
	if ($row = mysqli_fetch_array($query)) {
		echo '	<h2 class="title">Редагувати</h2>
				<div class="editCoins">
 				<form action="" method="post"  enctype="multipart/form-data">
 					<img src="../../bank_img/coins_img/'.$row[1].'" alt="">
 					<input type="file" name="img_coin" accept="image/jpg, image/JPG,image/JPEG, image/jpeg" >
 					<span>Назва</span>
 					<input type="text" name="title_coin" placeholder="Назва Монети" value="'.$row[2].'" required>
 					<span>Про монету</span>
 					<textarea name="about_coin" id="" cols="30" rows="10" placeholder="Про монету" required>'.$row[3].'</textarea>
 					<span>Рік</span>
 					<select name="year_coin" id="" required>';
 						list_year_coins($db);
 					echo '</select>
 					<span>Країна</span>
 					<select name="country_coin" id="" required>';
 					list_country_coins($db);
 					echo '</select>
 					<input type="submit" value="Редагувати" name="edit_coin">
 				</form>
 			</div>';
	}
	if (isset($_POST['edit_coin'])) {
		$title = sql_save($_POST['title_coin']);
 		$about = sql_save($_POST['about_coin']);
 		$year = $_POST['year_coin'];
 		$country = $_POST['country_coin'];
 		$imgLink = loadImg('img_coin','coins_img/');
 		if ($imgLink == NULL) {
 			mysqli_query($db,"UPDATE `coins` SET `title`='$title',`about`='$about',`country`='$country',`year`='$year' WHERE id='$id'");
 		}
 		else
 		{
 			mysqli_query($db,"UPDATE `coins` SET `img`='$imgLink',`title`='$title',`about`='$about',`country`='$country',`year`='$year' WHERE id='$id'");
 		}
	}
}
 ?>
