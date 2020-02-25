<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if($_SESSION['type']!='inadmin')
	header("location:/");
$category = new Categories();
if(isset($_POST['cid'])){
	$cid=$_POST['cid'];
	$category->deleteAllBooks($cid);
	if($category->deleteCategory($cid))
		header('location:/login?view=categories');
}
else
	header('location:/');
?>
