<?php
$user=new Users();
if(isset($_POST['resemailid'])){
	$emailid=mysqli_escape_string($conn,$_POST['resemailid']);
	session_start();
	$_SESSION['resemailid']=$emailid;
	if($user->freshUser($emailid,$conn))
		$user->flashError([NULL,NULL,'Email Address Not Registered'],'/');
	else{
		$row=$user->fetchUser($emailid);
		$name=$row['user_name'];
		$pass=$row['password'];
		$lnk='http://13.232.148.8/passwordreset?id='.$emailid.'&secret='.$pass;
		if(Mail::sendResetPasswordMail($lnk,$emailid,$name)){
			header("location:/splashmsg?msgtype=forgotpassword");
		}
		else{
			$user->flashError(['Internal Error, Try Again'],'/reset_password');
		}	
	}
}
else
	$user->flashError(['Please Enter Valid Email Address'],'/reset_password');
?>