<?php
$user = new Users();
$book = new Books();
$fetchAllUsers=$user->fetchInactiveUsers();
$subject="eLibrary | Newly Added Books";
$lastWeekBookList="The following are the Last Week Added Books: <ol>";
$fetchLastWeekBook=$book->fetchLastWeekBook();
while($bok=mysqli_fetch_assoc($fetchLastWeekBook)){
	$lastWeekBookList=$lastWeekBookList."<li>".$bok['book_name']." by ".$bok['author_name']."</li>";
}
$lastWeekBookList=$lastWeekBookList."</ol><br />";
foreach ($fetchAllUsers as $uid){
	$usr=$user->fetchUser($uid);
	if($usr['type']!=0){
		$email_id=$usr['email_id'];
		$name=$usr['user_name'];
		$body="Hello {$name},<br />";
		$body=$body.$lastWeekBookList;
		if(Mail::sendMail($email_id,$name,$body,$subject)){
			echo "SUCCESS..!";
			return TRUE;
		}
		else{
			echo "FAIL..!";
			return FALSE;
		}
	}
}
?>