<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if($_SESSION['type']!='inadmin')
	header("location:/");
else{
	require __dir__.'/../../core/bootstrap.php';
	$category = new Categories();
	if(isset($_POST['category_name'])){
		$categoryName=mysqli_escape_string($conn,$_POST['category_name']);
		$category->values=["'{$categoryName}'"];
		if($category->freshCategory())
			ob_clean();
		echo $category->registerCategory();
		die();
	}
	else{
		header("location:/");
	}
}
?>