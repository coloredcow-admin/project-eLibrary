<?php
$msg1=NULL;
?>
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog " role="form">
     <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Category Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name" onkeyup="checkFieldName('category_name')">
            <small class="form-text text-muted text-danger" id='errorcategory_name'><?=$msg1?></small>   
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="custDisp" id="custDisp">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="addCategory()">Add</button>
        </div>
      </div>
  </div>
</div>
