<?php
$msg1=NULL;
?>
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="form">
   <form action='/editcat' method="POST" onsubmit="return checkFieldName('category_name1')">
           <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Category Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" class="form-control" id="category_name1" name="category_name" placeholder="Enter Category Name"  onkeyup="checkFieldName('category_name1')">
            <small class="form-text text-muted text-danger" id='errorcategory_name1'><?=$msg1?></small>   
          </div>
               <input type="hidden" name="cid" id='cid'>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </div>
    </form>
  </div>
</div>