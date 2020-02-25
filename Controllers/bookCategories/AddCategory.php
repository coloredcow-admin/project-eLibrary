<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if($_SESSION['type']!='inadmin')
	header("location:/");
$category = new Categories();
if(isset($_POST['category_name'])){
	$categoryName=mysqli_escape_string($conn,$_POST['category_name']);
	$category->values=["'{$categoryName}'"];
	if($category->freshCategory())
		$category->registerCategory();
}
?>