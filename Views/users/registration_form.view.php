<div class="login100-pic js-tilt d-md-block d-none col-sm-6 col-9 col-md-3 col-lg-3 col-xl-3" data-tilt style="padding-bottom:10px; text-align:center; margin-left:20%;">
    <img src="https://pageturnprohome.files.wordpress.com/2019/07/compressediphone.png" alt="IMG" class="ml-3" style="max-width: 200px; height:auto;" />
    <h6 class="m-0 text-center">Complete Digital Library Platform for Personalized Learning</h6>
</div>
<div class="d-none d-md-block col-1"></div>
<div class="border border-secondary p-4 rounded bg-white col-sm-6 col-9 col-md-4 col-lg-3 mx-auto ml-md-5">
    <form action="/registration" method="post" onsubmit="return (checkFieldName('rname') && checkFieldEmail('remailid') && checkFieldPassword('rpassword') && passwordMatch('rpassword','password1'))">
        <h5 class="text-center mb-3">Sign up</h5>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
            </div>
            <input type="text" class="form-control" name="rname" id="rname" placeholder="Enter Full Name *" value="<?= $rname ?>" onkeyup="checkFieldName('rname')" onblur="checkFieldName('rname')">
        </div>
        <small class="form-text text-muted text-danger" id='errorrname'><?= $msg1 ?></small>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>
            <input type="email" class="form-control" name="remailid" id="remailid" placeholder="Enter Email *" value="<?= $emailid ?>" onkeyup="checkFieldEmail('remailid')" onblur="checkFieldEmail('remailid')">
        </div>
        <small class="form-text text-muted text-danger" id='errorremailid'><?= $msg2 ?></small>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
            <input type="password" class="form-control" name="rpassword" id="rpassword" placeholder="Enter Password *" value="<?= $password ?>" onkeyup="checkFieldPassword('rpassword')" onblur="checkFieldPassword('rpassword')">
        </div>
        <small id="errorrpassword" class="form-text text-muted text-danger"><?= $msg3 ?></small>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
            <input type="password" class="form-control" name="password1" id="password1" placeholder="Confirm Password *" onkeyup="passwordMatch('rpassword','password1')" onblur="passwordMatch('rpassword','password1')">
        </div>
        <small id="errorpassword1" class="form-text text-muted text-danger"></small>
        <button class="btn  btn-primary btn-block mt-2" type="submit">Get Started</button>
        <div class="row mx-1 my-1">
            <hr class="d-inline col">
            <p class="text-muted text-center d-inline col-2 pt-1 mb-0">or</p>
            <hr class="d-inline col">
        </div>         
        <button class="btn btn-outline-dark btn-block my-0" onclick="window.location='<?=$loginURL?>'"><img src="../resources/images/google_logo.jpg" class="d-inline rounded-circle mx-auto my-0 py-0"  alt="Login with Google" height="25"> &nbsp;Google Signup
        </button>
        <div class="text-center mt-3 pl-2 mb-0">
            Already Registered? <a class="" href="/">Login</a>    
        </div>
    </form>          
</div>