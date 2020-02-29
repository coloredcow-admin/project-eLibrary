<div class="border border-secondary p-4 rounded bg-white col-sm-6 col-9 col-lg-12 mx-auto">
	<form method="POST" action="/login" onsubmit="return (checkFieldEmail('emailid') &&checkFieldPassword('password'))">
		<h5 class="text-center">Welcome Back</h5>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="fa fa-envelope" aria-hidden="true"></i>
				</span>
			</div>
			<input type="email" class="form-control" name="emailid" id="emailid" placeholder="Enter Email Address *" value="<?= $emailid ?>" onkeyup="checkFieldEmail('emailid')" onblur="checkFieldEmail('emailid')">
		</div>
		<small class="form-text text-muted text-danger" id='erroremailid'><?= $msg1 ?></small>
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="fa fa-lock" aria-hidden="true"></i>
				</span>
			</div>
			<input type="password" class="form-control" id="password" placeholder="Enter Password *" name="password" value='<?= $password ?>' onkeyup="checkFieldPassword('password')" onblur="checkFieldPassword('password')">
		</div>
		<small class="form-text text-muted text-danger" id="errorpassword"><?= $msg2 ?></small>
		<small class="form-text text-muted text-right"><a href='javascript:void(0)'data-toggle="modal" data-target="#resetPasswordModal" title='Click here to get password reset link.'>Forgot Password?</a></small>
				<button class="btn btn-primary btn-block mt-2" type="submit">Login</button>
		<div class="row mx-1 my-1">
			<hr class="d-inline col">
			<p class="text-muted text-center d-inline col-2 pt-1 mb-0">or</p>
			<hr class="d-inline col">
		</div>       
		<button class="btn btn-outline-dark btn-block my-0" onclick="window.location='<?=$loginURL?>'"><img src="../resources/images/google_logo.jpg" class="d-inline rounded-circle mx-auto my-0 py-0"  alt="Login with Google" height="25"> &nbsp;Google Login
		</button>
		<div class="text-center mt-3 pl-2 mb-0">
			New User? <a class="" href="/index?register=1">Join here</a>	
		</div>
	</form>         
</div>
</form>
</div>