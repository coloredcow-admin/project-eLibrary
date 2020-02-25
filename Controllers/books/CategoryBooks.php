<?php
if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
if(isset($_POST['fcid'])) { 
	if($_POST['fcid']!=''){
		$cid=mysqli_escape_string($GLOBALS['conn'],$_POST['fcid']);
		$category=new Categories();
		$bookIds=[];
		$fetchBooks=$category->fetchBooks($cid);
		$_SESSION['category_name']=$category->fetchCategory($cid)['category_name'];
		while($rw=mysqli_fetch_assoc($fetchBooks))
			array_push($bookIds,$rw['bid']);
		$_SESSION['fetchBooks']=$bookIds;
	}
	else{
		$bookIds=[];
		unset($_SESSION['category_name']); 
		unset($_SESSION['fetchBooks']);
	}
	header('location:/login?books=1');
}
else 
	header('location:/login?books=1');
?>