<div class="d-flex bg-light py-5" style="min-height:calc(100% - 180px);">
	<div class="my-auto w-100">
		<form method="POST" action="/change_password" onsubmit="return (checkFieldPassword('password') && passwordMatch('password','password1'))" class="border border-secondary p-4 rounded bg-white col-md-5 col-sm-7 col-9 col-xl-4 mx-auto">
			<h5 class="text-center mb-4">Set New Password for<br/><q><i><?=$emailid?></i></q>	</h5>   
			<input type="password" class="form-control mt-2" id="password" placeholder="Enter Password *" name="password" onkeyup="checkFieldPassword('password')">
			<small class="form-text text-muted text-danger" id="errorpassword"><?=$msg1?></small>
			<input type="password" class="form-control mt-2" id="password1" placeholder="Confirm Password *" name="password1" onkeyup="passwordMatch('password','password1')">
			<input type="hidden" name='emailid' value="<?=$emailid?>">
			<small class="form-text text-muted text-danger" id="errorpassword1"></small>
			<button class="btn  btn-primary btn-block mt-3" type="submit">Change Password</button>
		</form>          
	</div>	
</div>
