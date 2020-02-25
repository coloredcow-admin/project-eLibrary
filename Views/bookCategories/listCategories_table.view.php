<div class="table-responsive">
  <table class="table table-striped">
    <thead style="">
      <tr class="text-center">
        <th scope="col" class="my-auto">#</th>
        <th scope="col" class="text-left">Name</th>
        <th scope="col"></th>
        <th></th>
      </tr>
    </thead>
    <tbody >
      <?php $i=1;
      while($row=mysqli_fetch_assoc($categories)):  ?>
        <tr>
          <th class="text-center"><?=$i++?></th>
          <td><?=$row['category_name'] ?></td>
          <td class="text-center">
            <a data-toggle="modal" data-target="#editCategoryModal" href='javascript:void(0);' data-cname="<?=$row['category_name']?>" data-cid="<?=$row['cid']?>"> <i class="fa fa-edit"></i></a>
          </td> 
          <td class="text-center">
            <a href='javascript:void(0)' class="text-danger" data-toggle="modal" data-target="#deleteCategoryModal" data-cname="<?=$row['category_name']?>" data-cid="<?=$row['cid']?>"><i class="fa fa-trash-alt"></i></a>
          </td> 
        </tr>
      <?php endwhile;?>
    </tbody>
  </table>
</div>   
  <div> <?php if($i==1)
              echo "<h4 class='mt-5 text-muted text-center'>No Records Found</h4>";?></div>

<?php  require __dir__.'/'.'../../Views/bookCategories/addCategory_form.view.php'; require __dir__.'/'.'../../Views/bookCategories/editCategory_form.view.php'; ?>



