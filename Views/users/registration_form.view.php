<div class="login100-pic js-tilt mx-auto" data-tilt style="padding-bottom:10px; text-align:center;">
    <img src="https://pageturnprohome.files.wordpress.com/2019/07/compressediphone.png" alt="IMG" style="max-width: 200px; height:auto;" />
    <h6 style="padding-top: 5px;">Complete Digital Library Platform for Personalized Learning</h6>
</div>
<div class="border border-secondary px-4 py-3 rounded bg-white col-sm-6 col-9 col-md-5 col-lg-4 col-xl-3 mx-auto">
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="resources/js/tilt.jquery.min.js"></script>
<script>
    $(".js-tilt").tilt({
        scale: 1.1
    });
</script>