<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if($_SESSION['type']!='inadmin')
	header("location:/");
$book = new Books();
$category = new Categories();
$categories=$category->fetchCategories();
if(isset($_POST['book_name']) and isset($_POST['author_name']) and isset($_POST['edition']) and isset($_POST['bid'])) {
	$categories=array();
	$i=1;
	$makeId='cid'.$i++;
	$c=new Categories();
	while(($i-1)<=mysqli_num_rows($c->fetchCategories()))	{
		if(isset($_POST[$makeId]))
			array_push($categories,mysqli_escape_string($conn,$_POST[$makeId]));
		$makeId='cid'.$i++;
	}
	$book_name=mysqli_escape_string($GLOBALS['conn'],$_POST['book_name']);
	$author_name=mysqli_escape_string($GLOBALS['conn'],$_POST['author_name']);
	$edition=mysqli_escape_string($GLOBALS['conn'],$_POST['edition']);
	$bid=mysqli_escape_string($GLOBALS['conn'],$_POST['bid']);
	$booknames=['book_name','author_name','edition'];
	$bookvalues=[$book_name,$author_name,$edition];
	$book->updateBook($booknames,$bookvalues,$bid);
	$book->deleteAllCategories($bid);
	$book->enterCategories($bid,$categories);
	if($_FILES["book_cover"]["name"]){
		$t=substr($book_name,0,5);
		$i=substr($edition,0,5);
		$title=str_replace(' ','',$t).str_replace(' ', '', $i);		
		$target_dir = __dir__.'/'.'../../resources/uploads/';   
		$filename=$title.".jpg";      
		$target_file = $target_dir . $filename;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if ($_FILES["book_cover"]["size"] > 1048576) {
			echo "string1";
			Users::flashError(['Sorry, your file is too large. '],'/login?books=1');
		}
		if($imageFileType != "jpg") {
			echo "string2";
			Users::flashError(['Upload File is not jpg Image '],'/login?books=1');
		}
		$deltitle=$_POST['cover_name'];
		$delfilename=$deltitle.".jpg";      
		$delfile_pointer = __dir__.'/'.'../../resources/uploads/'.$delfilename;  
		unlink($delfile_pointer); 
		$booknames=['cover_image_name'];
		$bookvalues=[$title];
		$book->updateBook($booknames,$bookvalues,$bid);
		if (!move_uploaded_file($_FILES["book_cover"]["tmp_name"], $target_file)) {	
			header('location:/login?view=books');		
		}
	}
	header('location:/login?view=books');		
}
if(isset($_GET['bid'])){
	$bid=$_GET['bid'];
	$rows=$book->fetchBook($bid);
	$book_name=$rows['book_name'];
	$author_name=$rows['author_name'];
	$edition=$rows['edition'];
	$cover=$rows['cover_image_name'];
	require __dir__.'/'.'../../Views/common/sidebar.php'; 
	require __dir__.'/'.'../../Views/books/editbook_form.view.php';
}
elseif(!isset($_POST['book_name'])) {
	header('location:/');
}
?>