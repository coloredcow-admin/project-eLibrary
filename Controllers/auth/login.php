<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$user=new Users;
$book=new Books;
if (isset($_SESSION['token']) and isset($_SESSION['loginid'])) {
	$name=$_SESSION['loginid'];
	$row=$user->fetchUser($name);
	$type=$row['type'];    			
	$uid=$row['uid'];
	$name=$row['user_name'];
	$email=$row['email_id'];
	unset($_SESSION['token']);
	unset($_SESSION['loginid']);
	require __dir__.'/'.'../../Controllers/common/setUserSession.php';
	header('location:/');
}
elseif(!isset($_SESSION['uid'])){
	if(isset($_POST['emailid']) && $_POST['emailid']!='') {
		$name=mysqli_escape_string($conn,$_POST['emailid']);
		$_SESSION['name']=$name;
		if(isset($_POST['password']) && $_POST['password']!=''){
			$pass=mysqli_escape_string($conn,$_POST['password']);
			$_SESSION['password']=$pass;
			$row=$user->fetchUser($name);
			$user->verify($row,$pass);
		}
		else
			$user->flashError([NULL,'Please Enter Password'],'/');
	}
	else
		$user->flashError(['Please Enter Email Address','Please Enter Password'],'/');
}    ?>
<?php $styleValues='min-height:calc(100% - 180px);';
if(isset($_GET['listbooks']))
	$styleValues='min-height:calc(100% - 140px);';
?>
<div class="container-fluid bg-light" style="<?=$styleValues?>">
	<div class="row">
		<?php  
		if (isset($_SESSION['type'])):
			if($_SESSION['type']=='inadmin'):
				$total_users=mysqli_num_rows($user->fetchUsers())-1;
				$total_books=mysqli_num_rows($book->fetchBooks());
				?>
				<?php require __dir__.'/'.'../../Views/common/sidebar.php';  ?> 
				<main role="main" class="ml-sm-auto col-lg-10 pt-3 px-4">
					<?php
					$category = new Categories();
					$categories=$category->fetchCategories(); 
					$total_categories=mysqli_num_rows($categories);
					?>
					<div class="text-center text-lg-left border-bottom">
						<?php if(!isset($_GET['view'])):?>
							<h2>Dashboard</h2>
						</div>
						<div class="card-deck mt-4 mb-3 text-center">
							<div class="card mb-4 shadow-sm">
								<div class="card-header">
									<h4 class="my-0 font-weight-normal">Users <i class="fas fa-users"></i>
									</h4>
								</div>
								<div class="card-body">
									<h1 class="card-title pricing-card-title"><?=$total_users?> </h1>
									<a href='/login?view=users' class="btn btn-lg btn-block cust-link-primary">More info <i class="fas fa-info-circle"></i>
									</a>
								</div>
							</div>
							<div class="card mb-4 shadow-sm">
								<div class="card-header">
									<h4 class="my-0 font-weight-normal">Categories <i class="fas fa-list"></i></h4>
								</div>
								<div class="card-body">
									<h1 class="card-title pricing-card-title"><?=$total_categories?> </h1>
									<a href='/login?view=categories' class="btn btn-lg btn-block cust-link-primary">Manage <i class="fas fa-edit"></i></a>
								</div>
							</div>
							<div class="card mb-4 shadow-sm">
								<div class="card-header">
									<h4 class="my-0 font-weight-normal">Books <i class="fas fa-book"></i>
									</h4>
								</div>
								<div class="card-body">
									<h1 class="card-title pricing-card-title"><?=$total_books?></h1>
									<a href='/login?view=books' class="btn btn-lg btn-block cust-link-primary">More Info <i class="fas fa-info-circle"></i></a>
								</div>
							</div>
						</div>
						<?php elseif($_GET['view']=='books'): ?>
							<h2>Books <a href='/addbook'><i class="fas fa-plus-square h4 cust-link-primary"></i></a>
							</h2>	
						</div>
						<?php require __dir__.'/'.'../books/ListBooks.php';?>

						<?php elseif($_GET['view']=='users'): ?>
							<h2>Users</h2>
						</div>
						<?php require __dir__.'/'.'../users/ListAllUsers.php'; ?>
						<?php elseif($_GET['view']=='categories'): ?>
							<h2>Categories
								<a href='#'  class="" data-toggle="modal" data-target="#addCategoryModal" data-randdata="reload"><i class="fas fa-plus-square h4 cust-link-primary"></i></a></h2>
							</div>

							<?php require __dir__.'/'.'../bookCategories/ListCategories.php';
						endif;?>	
						<?php 

					elseif ($_SESSION['type']=='inreader'):
						?>
						<main role="main" class="container my-3 px-0">
							<?php if(isset($_GET['listbooks'])){?>
								<div class="text-center border-bottom">
									<h4 class="my-2 pb-2 font-weight-normal">My Books </h4></div> 
									<?php
									require __dir__.'/'.'../books/UserBooks.php';	
								}else { ?>
									<div class="text-center border-bottom">
										<h4 class="my-2 pb-2 font-weight-normal">Books </h4></div> <?php
										require __dir__.'/'.'../books/ListBooks.php';	
									}
								else :
									header('location:/');
								endif;
							endif;
							?>
						</main>
					</div>
				</div>