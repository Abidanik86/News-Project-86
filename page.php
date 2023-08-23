<?php 
$limit = 4;
if (isset($_GET['page'])) {
   $page = $_GET['page'];
}else{
	$page = 1;
}
$ofset = ($page - 1) * $limit;
?>