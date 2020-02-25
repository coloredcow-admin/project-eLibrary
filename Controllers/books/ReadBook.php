<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_SESSION['uid'])){
	$user =new Users();	
	$uid=$_SESSION['uid'];
	if(isset($_GET['dbid'])){
		$bid=$_GET['dbid'];
		$user->unreadBook($uid,$bid);
		header('location:/login?listbooks=1');
	}
	elseif(isset($_POST['bid'])){
			$bid=$_POST['bid'];
			$user->readBook($uid,$bid);
			return TRUE;
		}
		elseif(isset($_POST['dbid'])){
			$bid=$_POST['dbid'];
			$user->unreadBook($uid,$bid);
		}
		else 
			return FALSE;
}
else 
	header("location:/");
?>