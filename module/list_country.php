<?php 
function list_country($db){
	$query = mysqli_query($db,"SELECT * FROM country");
	$list_html = "";
	while ($row =  mysqli_fetch_array($query)) {
		$list_html.='<div class="rowCountry">
			<img src="../../bank_img/country_icon/'.$row[1].'" alt="">
			<h3>'.$row[2].'</h3>
			<a href="?del_country='.$row[0].'">Видалити</a>
		</div>';
	}
	echo $list_html;
}
function del_country($id,$db){
	$id = sql_save($id);
	mysqli_query($db,"DELETE FROM `country` WHERE id='$id'");

}
function list_year($db){
	$query = mysqli_query($db,"SELECT * FROM year");
	$list_html = "";
	while ($row =  mysqli_fetch_array($query)) {
		$list_html.='<div class="rowCountry">
			<h3>'.$row[1].'</h3>
			<a href="?del_year='.$row[0].'">Видалити</a>
		</div>';
	}
	echo $list_html;
}
function del_year($id,$db){
	$id = sql_save($id);
	mysqli_query($db,"DELETE FROM `year` WHERE id='$id'");

}

 ?>

