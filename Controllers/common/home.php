<?php
require __dir__ . '/' . '../../Controllers/auth/checkAuthentication.php';
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (isset($_SESSION['type'])) {
	header('location:/login');
}
$msg1 = $msg2 = $msg3 = $emailid = $password = $rname = NULL;
if (isset($_SESSION['error1'])) {
	$msg1 = "<p class='text-danger'>{$_SESSION['error1']}</p>";
	unset($_SESSION['error1']);
}
if (isset($_SESSION['error2'])) {
	$msg2 = "<p class='text-danger'>{$_SESSION['error2']}</p>";
	unset($_SESSION['error2']);
}
if (isset($_SESSION['error3'])) {
	$msg3 = "<p class='text-danger'>{$_SESSION['error3']}</p>";
	unset($_SESSION['error3']);
}
if (isset($_SESSION['name'])) {
	$emailid = $_SESSION['name'];
	unset($_SESSION['name']);
}

if (isset($_SESSION['password'])) {
	$password = $_SESSION['password'];
	unset($_SESSION['password']);
}
if (isset($_SESSION['rname'])) {
	$rname = $_SESSION['rname'];
	unset($_SESSION['rname']);
}
?>
<div class="row bg-light d-flex align-items-center py-3" style="min-height:calc(100% - 140px);">
	<?php if (isset($_GET['register']))
		require __dir__ . '/' . '../../Views/users/registration_form.view.php';
	elseif ((Request::uri() == '') || (Request::uri() == 'index.php') || (Request::uri() == 'index')) {
	?>
		<div class="col-lg-1 col-xl d-none d-lg-block"></div>
		<div class="col-xl-5 col-lg-5 ml-lg-4 col-md-6 p-0 mx-auto mb-4 mb-lg-0 col-sm-6 col-8">
			<div class="text-lg-left text-center ml-lg-5 text-muted ml-lg-5">
				<div class="ml-lg-5">
					<div>
						<p class="lead" style="font-size:1.4em; font-weight:500;">
							A bookkeeping application that maintains an inventory of books and records your read list.</p>
					</div>
					<div class="text-center mt-5 mr-lg-5">
						<p class="lead my-0" style="font-size:1.4em;"><q>Today a Reader, Tomorrow a Leader.</q></p>
						<p class="text-center" style="font-size:0.9rem;">- Margaret Fuller</p>
					</div>
					<div class="mt-4">
						<p class="lead mt-4" style="font-size:1.5em;"><b>Benefits</b><i class="fas fa-star h5"></i></p>
						<p class="lead mt-2" style="font-size:1.3em; letter-spacing: 0.2px;  "><i class="fas fa-check"></i> Increases reading habits </p>
						<p class="lead mt-2" style="font-size:1.3em; "><i class="fas fa-check"></i> Exposure to more books</p>
						<p class="lead mt-2" style="font-size:1.3em;   letter-spacing: 0.6px;  "><i class="fas fa-check"></i> Entertainment&nbsp;&amp;&nbsp;Peace</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-5 col-lg-5 mr-lg-5 pr-lg-5 col-md-12 ml-0">
			<div class="col-xl-9">
				<div class="mr-lg-5">

					<?php require __dir__ . '/' . '../../Views/users/login_form.view.php';
					?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>