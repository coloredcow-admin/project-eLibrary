<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$msg1=$msg2=$msg3=$msg4=NULL;
$book = new Books();
$user=new Users;
if($_SESSION['type']!='inadmin'){
	header('location:/');
}
else{
	if(isset($_POST['book_name']) and isset($_POST['author_name']) and isset($_POST['book_edition'])){
		if($_POST['book_name']!=''){
			$book_name=mysqli_escape_string($conn,$_POST['book_name']);
			$_SESSION['book_name']=$book_name;	
		}
		else{
			$user->flashError(['Invalid Book Name'],'/editbook');
		}	
		if($_POST['author_name']!=''){
			$author_name=mysqli_escape_string($conn,$_POST['author_name']);
			$_SESSION['author_name']=$author_name;	
		}
		else{
			$user->flashError([NULL,'Invalid Author Name'],'/editbook');
		}	
		if($_POST['book_edition']!=''){
			$book_edition=mysqli_escape_string($conn,$_POST['book_edition']);
			$_SESSION['book_edition']=$book_edition;	
		}
		else{
			$user->flashError([NULL,NULL,'Invalid Book Edition'],'/editbook');
		}	
		if(isset($book_name) && isset($author_name) && isset($book_edition)){
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
	}
	else{
		$msg1=$msg2=$msg3=$book_name=$author_name=$book_edition=NULL;
		if(isset($_SESSION['error1'])){
			$msg1="<p class='text-danger'>{$_SESSION['error1']}</p>";
			unset($_SESSION['error1']);
		}
		if (isset($_SESSION['error2'])){
			$msg2="<p class='text-danger'>{$_SESSION['error2']}</p>";
			unset($_SESSION['error2']);
		}
		if (isset($_SESSION['error3'])){
			$msg3="<p class='text-danger'>{$_SESSION['error3']}</p>";
			unset($_SESSION['error3']);
		}
		if(isset($_SESSION['book_name'])){
			$book_name=$_SESSION['book_name'];
			unset($_SESSION['book_name']);
		}

		if(isset($_SESSION['author_name'])){
			$author_name=$_SESSION['author_name'];
			unset($_SESSION['author_name']);
		}
		if(isset($_SESSION['book_edition'])){
			$book_edition=$_SESSION['book_edition'];
			unset($_SESSION['book_edition']);
		}
		if(isset($_GET['bid']) || isset($_POST['bid'])){
			$bid=(isset($_GET['bid']))?$_GET['bid']:$_POST['bid'];
			$rows=$book->fetchBook($bid);
			$book_name=$rows['book_name'];
			$author_name=$rows['author_name'];
			$edition=$rows['edition'];
			$cover=$rows['cover_image_name'];
			$category = new Categories();
			$categories=$category->fetchCategories();
			require __dir__.'/'.'../../Views/common/sidebar.php'; 
			require __dir__.'/'.'../../Views/books/editbook_form.view.php';
		}
		elseif(!isset($_POST['book_name'])) {
			header('location:/');
		}
	}
}
?>