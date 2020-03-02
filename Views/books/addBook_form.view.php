<div class="container-fluid bg-light">
  <div class="row">
    <div class="col-md m-3">
      <div class="modal-dialog" role="form">
        <form action='/addbook' method="POST" enctype="multipart/form-data" onsubmit="return (checkFieldName('book_name') && checkFieldName('author_name') && checkFieldName('book_edition') && checkFileInput('book_cover'))">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Enter Book Details</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Enter Book Name *"  onfocus='hideAllCategories()' onkeyup="checkFieldName('book_name')">
                <small class="form-text text-muted text-danger" id='errorbook_name'><?=$msg1?></small>   
              </div>
              <div class="form-group row mb-1">
               <div class="col mr-0 pr-0">
                 <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Enter Author Name *"   onfocus='hideAllCategories()' onkeyup="checkFieldName('author_name')">
                 <small class="form-text text-muted text-danger" id='errorauthor_name'><?=$msg2?></small>  
               </div>
               <div class="col ml-0 pl-0">
                 <input type="text" class="form-control" id="book_edition" name="book_edition" placeholder="Enter Book Edition *"   onfocus='hideAllCategories()' onkeyup="checkFieldName('book_edition')">
                 <small class="form-text text-muted text-danger" id='errorbook_edition'><?=$msg3?></small>  
               </div>
             </div>
             <div class="form-group"> <label for="dynamic-cat">Categories</label> <a href='#'  data-toggle="modal" data-target="#addCategoryModal" data-randdata="text"><small><i class="text-primary">Add new</i></small></a> <small class="text-muted">(Optional)</small> 
              <span class="form-control custom-select h-auto"  style="cursor: pointer;" id="dynamic-cat" onclick="dropAllCategories();">     
                <span id="selected" class="w-auto">Select from here</span>
                <ul id="listAll" class="cust-hide cust-select">
                  <?php 
                  $i=1;
                  while($categoryFetch=mysqli_fetch_assoc($categories)):  
                    $makeId='cid'.$i;
                    $cname=$categoryFetch['category_name'];
                    $cid=$categoryFetch['cid'];
                    ?>
                    <li id='<?php echo "li_".$cid; ?>' onclick="selectMe('<?=$cid?>','<?=$cname?>','<?=$makeId?>')" ><?=$cname?></li>
                    <?php
                    $i++;
                  endwhile;
                  ?>
                </ul>
              </span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="book_cover" accept="image/*" name="book_cover"  onfocus='hideAllCategories()' onchange="checkFileInput('book_cover')">
              <label class="custom-file-label" for="book_cover">Book Cover * </label>
              <small class="form-text text-muted mt-0 ml-2">Note* - Size Must Be Less Than 1MB.</small>
              <small class="form-text text-muted text-danger" id='errorbook_cover'><?=$msg4?></small>
            </div>
            <div class="row">
              <label for="book_cover"    onfocus='hideAllCategories()' class='mx-auto mt-2 align-self-center' >
                <img id="cover_image"  style='height:255px; width:170px;'> 
              </label>
            </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-secondary"   onfocus='hideAllCategories()' href='/login?view=books'>Close</a>
            <button type="submit"   onfocus='hideAllCategories()' class="btn btn-primary">Add Book</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<?php  require __dir__.'/'.'../../Views/bookCategories/addCategory_form.view.php';?>