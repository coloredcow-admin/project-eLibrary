 <div class="border border-secondary p-4 rounded bg-white col-sm-6 col-9 col-md-5 col-lg-4 col-xl-3 mx-auto">
  <form action="/registration" method="post" style="margin-bottom:-8px; " onsubmit="return (checkFieldName('rname') && checkFieldEmail('remailid') && checkFieldPassword('rpassword') && passwordMatch('rpassword','password1'))">
    <h5 class="text-center">Signup</h5>   
    <input type="text" class="form-control mt-3" name="rname" id="rname" placeholder="Enter Full Name *" value="<?=$rname?>" onkeyup="checkFieldName('rname')" onblur="checkFieldName('rname')">
    <small class="form-text text-muted text-danger" id='errorrname'><?=$msg1?></small>
    <input type="email" class="form-control  mt-2" name="remailid" id="remailid" placeholder="Enter Email *" value="<?=$emailid?>" onkeyup="checkFieldEmail('remailid')" onblur="checkFieldEmail('remailid')">
    <small class="form-text text-muted text-danger" id='errorremailid'><?=$msg2?></small>
    <input type="password" class="form-control  mt-2" name="rpassword"  id="rpassword" placeholder="Enter Password *" value="<?=$password?>" onkeyup="checkFieldPassword('rpassword')" onblur="checkFieldPassword('rpassword')">
    <small id="errorrpassword" class="form-text text-muted text-danger"><?=$msg3?></small>
    <input type="password" class="form-control  mt-2" name="password1" id="password1" placeholder="Confirm Password *" onkeyup="passwordMatch('rpassword','password1')" onblur="passwordMatch('rpassword','password1')">
    <small id="errorpassword1" class="form-text text-muted text-danger"></small>
    <button class="btn  btn-primary btn-block mt-2" type="submit">Get Started</button>     
    <div class="row mx-1 my-1">
        <hr class="d-inline col">
        <p class="text-muted text-center d-inline col-2 pt-1 mb-0">or</p>
        <hr class="d-inline col">
    </div>         
    <button class="btn btn-outline-dark btn-block my-0" onclick="window.location='<?=$loginURL?>'"><img src="../resources/images/google_logo.jpg" class="d-inline rounded-circle mx-auto my-0 py-0"  alt="Login with Google" height="25"> &nbsp;Google Signup
    </button>
    <div class="text-center mt-2 pl-2 mb-0">
        Already Registered? <a class="" href="/">Login</a>    
    </div>
</form>          
</div>