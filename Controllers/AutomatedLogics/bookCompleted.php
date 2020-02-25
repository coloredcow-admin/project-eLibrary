<?php
$user = new Users();
$fetchUsersWithAllBookRead=$user->fetchUsersWithAllBookRead();
foreach ($fetchUsersWithAllBookRead as $uid) {
	$usr=$user->fetchUser1($uid);
	$email_id=$usr['email_id'];
	$name=$usr['user_name'];
	$body="Hello {$name},<br />The following Book is newly Added, You can check in eLibrary Portal:<br /><ol>";
	$subject="eLibrary | Newly Added Book";
	$body=$body."<li>".$book_name.' by '.$author_name.'</li>';
	$body=$body."</ol>";
	Mail::sendMail($email_id,$name,$body,$subject);
}
?>