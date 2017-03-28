<?php 
function list_country($db){
	$query = mysqli_query($db,"SELECT * FROM country");
	$list_html = "";
	while ($row =  mysqli_fetch_array($query)) {
		$list_html.='<div class="rowCountry">
			<img src="'.$row[1].'" alt="">
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
 ?>

