<?php if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>
<nav class="p-3 px-5 bg-white border-bottom position-sticky sticky-top w-100 shadow-sm navbar navbar-expand-sm navbar-light" style="z-index:4;">
	<a href="/" class="navbar-brand" title='Go to home'>
		<h2 style="font-family: Georgia;" class="">eLibrary</h2>
	</a>
	
	<?php if((Request::uri()=='login')||(Request::uri()=='editbook')):?>	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbartoggler" aria-controls="navbartoggler"  aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon" title="Menu"></span>
	</button>
<?php endif;?>

<div class="collapse navbar-collapse" id="navbartoggler">
	<ul class="navbar-nav mr-sm-0 ml-5 mx-auto text-center">
			<?php 
			if((Request::uri()=='verifymsg')):?>
				<li class="nav-item">Done Verification?<a class="btn btn-outline-primary mr-5 ml-5" href="/index">Log in</a></li>
				<?php elseif($type==='inadmin'):?>
					<li class="nav-item mx-5">
						Hello, 
						<div class="dropdown d-inline">
							<a class="btn-link text-dark font-weight-bold" href='javascript:void(0)' id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?=$_SESSION['username']?> <i class="fa fa-caret-down"></i>
							</a>
							<div class="dropdown-menu mr-5 shadow-lg ml-5 ml-sm-0" style='left:-100px;top:20px;' 
							aria-labelledby="dropdownMenuButton">
							<div class='dropdown-header'><i class='fa fa-user-cog h5'></i> Admin </div>
							<div class='dropdown-header'><i class='fa fa-envelope h5'></i> <?=$_SESSION['email']?> </div>
							<div class='dropdown-item m-0 p-0'><a href='#logoutModal'  class='dropdown-item btn-link font-weight-bold' data-toggle='modal' data-target='#logoutModal' title='logout my account'>
								<i class='fa fa-sign-out-alt h5'></i> Logout</a></div>
							</div>
						</div>
					</li>
				<?php  elseif($type==='inreader'):
					if(!isset($_GET['listbooks'])):?>				
						<li class="nav-item ml-lg-5 mr-lg-5 mt-2 mb-2 mr-2">
							<a class="btn btn-link cust-link-primary" href="login?listbooks=1" title="list of read books">My Books</a>
						</li>	
					<?php else:?>
						<li class="nav-item ml-lg-5 mr-lg-5 mt-2 mb-2 mr-2">
							<a class="btn btn-link cust-link-primary font-weight-bolder" href="login?listbooks=1" title="list of read books">My Books <i class="fa fa-caret-left"></i></a>
						</li>	
					<?php endif;?>
					<li class="nav-item mx-5 mt-3">
						Hello, 
						<div class="dropdown d-inline">
							<a class="btn-link text-dark font-weight-bold" href='javascript:void(0)' id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?=$_SESSION['username']?> <i class="fa fa-caret-down"></i>
							</a>
							<div class="dropdown-menu mr-5 shadow-lg ml-5 ml-sm-0" style='left:-100px;top:20px;' 
							aria-labelledby="dropdownMenuButton">
							<div class='dropdown-header'><i class='fa fa-book-reader h5'></i> Reader </div>
							<div class='dropdown-header'><i class='fa fa-envelope h5'></i> <?=$_SESSION['email']?> </div>
							<div class='dropdown-item p-0 m-0'>
								<a href='#logoutModal'  class='dropdown-item btn-link font-weight-bold' data-toggle='modal' data-target='#logoutModal' title='logout my account'><i class='fa fa-sign-out-alt h5'></i> Logout</a></div>
							</div>
						</div>
					</li>	
				<?php endif;?>
			</ul>
		</div>
	</nav>