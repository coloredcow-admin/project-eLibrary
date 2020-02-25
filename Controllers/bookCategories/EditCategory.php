<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if($_SESSION['type']!='inadmin')
	header("location:/");
$category = new Categories();
if(isset($_POST['category_name']) and isset($_POST['cid'])){
$categoryName=mysqli_escape_string($GLOBALS['conn'],$_POST['category_name']);
$cid=mysqli_escape_string($GLOBALS['conn'],$_POST['cid']);
$category->updateCategory($categoryName,$cid);
header('location:/login?view=categories');
}

if(isset($_GET['cid'])){
	$cid=$_GET['cid'];
	$rows=$category->fetchCategory($cid);
	$category_name=$rows['category_name'];
	require __dir__.'/'.'../../Views/bookCategories/editCategory_form.view.php';
}
?>
