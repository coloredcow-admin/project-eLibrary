<?php
$msg1=$msg2=$msg3=$msg4=NULL;
?>
<div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="form">
    <form action='/addbook' method="POST" enctype="multipart/form-data" onsubmit="return (checkFieldName('book_name') && checkFieldName('author_name') && checkFieldName('book_edition') && checkFileInput('book_cover'))">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Enter Book Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Enter Book Name *"  onkeyup="checkFieldName('book_name')">
            <small class="form-text text-muted text-danger" id='errorbook_name'><?=$msg1?></small>   
          </div>
          <div class="form-group row">
           <div class="col mr-0 pr-0">
             <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Enter Author Name *" onkeyup="checkFieldName('author_name')">
             <small class="form-text text-muted text-danger" id='errorauthor_name'><?=$msg2?></small>  
           </div>
           <div class="col ml-0 pl-0">
             <input type="text" class="form-control" id="book_edition" name="book_edition" placeholder="Enter Book Edition *" onkeyup="checkFieldName('book_edition')">
             <small class="form-text text-muted text-danger" id='errorbook_edition'><?=$msg3?></small>  
           </div>
         </div>
         <div class="form-group">&nbsp;&nbsp;&nbsp;Categories <small class="text-muted ">(Optional)</small>
          <div class="input-group">
           <?php 
           $i=1;
           while($categoryFetch=mysqli_fetch_assoc($categories)):  
            $makeId='cid'.$i;
            $cname=$categoryFetch['category_name'];
            $cid=$categoryFetch['cid'];
            ?>
            <label <?="for='{$makeId}'"?> class='form-control'><?=$cname?> <input  type='checkbox' <?="name='{$makeId}' id='{$makeId}'  value='{$cid}' "?> style="width:15px; height:15px;"></label>
            <?php 
            if($i%2==0):
              ?>
            </div>
            <div class='input-group'>
              <?php
            endif;
            $i++;
          endwhile;
          ?>
        </div>
      </div>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="book_cover" accept="image/*" name="book_cover" onchange="checkFileInput('book_cover')">
        <label class="custom-file-label" for="book_cover">Book Cover * </label>
        <small class="form-text text-muted mt-0 ml-2">Note* - Size Must Be Less Than 1MB.</small>
        <small class="form-text text-muted text-danger" id='errorbook_cover'><?=$msg4?></small>
      </div>
      <div class="row">
        <label for="book_cover" class='mx-auto mt-2 align-self-center' >
          <img id="cover_image"  style='height:255px; width:170px;'> 
        </label>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Add Book</button>
    </div>
  </div>
</form>
</div>
</div>