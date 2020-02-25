<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if($_SESSION['type']!='inadmin')
	header("location:/");
$book= new Books();
if(isset($_POST['book_name']) and isset($_POST['author_name']) and isset($_POST['book_edition'])){
	$book_name=mysqli_escape_string($conn,$_POST['book_name']);
	$author_name=mysqli_escape_string($conn,$_POST['author_name']);
	$edition=mysqli_escape_string($conn,$_POST['book_edition']);
	$i=1;
	$categories=array();
	$makeId='cid'.$i++;
	$c=new Categories();
	while(($i-1)<=mysqli_num_rows($c->fetchCategories()))	{
		if(isset($_POST[$makeId]))
			array_push($categories,mysqli_escape_string($conn,$_POST[$makeId]));
		$makeId='cid'.$i++;
	}
	$t=substr($book_name,0,5);
	$i=substr($edition,0,5);
	$title=str_replace(' ','',$t).str_replace(' ', '', $i);		
	$target_dir = __dir__.'/'.'../../resources/uploads/';   
	$filename=$title.".jpg";      
	$target_file = $target_dir . $filename;
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$check = getimagesize($_FILES["book_cover"]["tmp_name"]);
	if(($check == true)&&($_FILES["book_cover"]["size"] < 1048576)&&($imageFileType == "jpg")) {
		if (move_uploaded_file($_FILES["book_cover"]["tmp_name"], $target_file)) {
			if($bid=$book->registerBook($book_name,$author_name,$edition,$title)){
				$book->enterCategories($bid,$categories);
				require __dir__.'/'."../AutomatedLogics/bookCompleted.php";
				header('location:/login?view=books');
			}
			else
				header('location:/login?view=books');		
		}
		else
			header('location:/login?view=books');
	}
	else
			header('location:/login?books=1');
}
else
header('location:/');
?>
