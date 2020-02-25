<div class="border border-secondary p-4 rounded bg-white col-sm-6 col-9 col-lg-12 mx-auto">
	<form method="POST" action="/login"  onsubmit="return (checkFieldEmail('emailid') &&checkFieldPassword('password'))">
		<h5 class="text-center">Welcome Back</h5>   
		<input type="email" class="form-control mt-4" name="emailid" id="emailid"  placeholder="Enter Email Address *" value="<?=$emailid?>" onkeyup="checkFieldEmail('emailid')" onblur="checkFieldEmail('emailid')">
		<small class="form-text text-muted text-danger" id='erroremailid'><?=$msg1?></small>
		<input type="password" class="form-control mt-2" id="password" placeholder="Enter Password *" name="password" value='<?=$password?>' onkeyup="checkFieldPassword('password')" onblur="checkFieldPassword('password')">
		<small class="form-text text-muted text-danger" id="errorpassword"><?=$msg2?></small>
		<small class="form-text text-muted text-right"><a href="/reset_password">Forgot Password?</a></small>
		<button class="btn  btn-primary btn-block mt-2" type="submit">Log in</button>
		<div class="row mt-3 m-1">
			<hr class="d-inline col">
			<p class="text-muted text-center d-inline col-6 mt-1">or log in with</p>
			<hr class="d-inline col">
		</div>         
		<a href="<?=$loginURL?>">
			<img src="../resources/images/google_logo.jpg" class="rounded-circle mx-auto d-block p-2"  alt="Login with Google" height="70"  onMouseOver="this.style.boxShadow = '0px 0px 3px #000'; this.style.transitionDuration = '0.3s';" onMouseOut="this.style.boxShadow = '0 0 0 #000'; this.style.transitionDuration = '0.3s';">
		</a>
	</div>
</form>          
</div>
