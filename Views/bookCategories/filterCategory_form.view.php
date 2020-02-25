<?php
$category=new Categories();
$allCategories=$category->fetchCategories();
?>
<form action='/filterBook' method="POST" class="form-inline">
 <div class="input-group mx-auto">
		<div class="input-group-prepend">
			<i class="fa fa-filter input-group-text p-2" style="font-size:1.18rem;"></i>
		</div>
		<select class="input-control custom-select" onchange="this.form.submit()" id="category" name="fcid"   style="cursor: pointer;">
			<?php if(isset($_SESSION['category_name'])):?>
				<option value="" selected class="badge badge-dark"><?=$_SESSION['category_name']?></option>
			<?php endif;?>
			<option value="">All Categories</option>
			<?php
			while($row=mysqli_fetch_assoc($allCategories)):
				$cname=$row['category_name'];
				$cid=$row['cid'];
				?>
				<option value="<?=$cid?>"><?=$cname?></option>
			<?php endwhile;?>
		</select>
	</div>
</form>

