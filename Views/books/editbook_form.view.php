<div class="container-fluid bg-light">
  <div class="row">
    <div class="col-md m-3">
      <div class="modal-dialog" role="form">
        <form action='/editbook' method="POST" enctype="multipart/form-data"  onsubmit="return (checkFieldName('book_name') && checkFieldName('author_name') && checkFieldName('edition'))">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Edit Book Details</h5>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="book_name">Book Name</label>
                <input type="text" class="form-control" id="book_name" name="book_name" value="<?=$book_name?>" onfocus='hideAllCategories()' onkeyup="checkFieldName('book_name')">
                <small class="form-text text-muted text-danger" id='errorbook_name'><?=$msg1?></small>
              </div>
              <div class="form-group">
                <label for="author_name">Author Name</label>
                <input type="text" class="form-control" id="author_name" name="author_name" value="<?=$author_name?>" onfocus='hideAllCategories()' onkeyup="checkFieldName('author_name')">
                <small class="form-text text-muted text-danger" id='errorauthor_name'><?=$msg2?></small>
              </div>
              <div class="form-group">
                <label for="edition">Edition</label>
                <input type="text" class="form-control" id="edition" name="edition" value="<?=$edition?>" onfocus='hideAllCategories()' onkeyup="checkFieldName('edition')">
                <small class="form-text text-muted text-danger" id='erroredition'><?=$msg3?></small>
              </div>
              <div class="form-group"> <label for="dynamic-cat">Categories</label> <a href='#'  class='cust-link-primary' data-toggle="modal" data-target="#addCategoryModal" data-randdata="text"><small><i>Add new</i></small></a> <small class="text-muted">(Optional)</small> 
                <span class="form-control custom-select h-auto"  style="cursor: pointer;" id="dynamic-cat" onclick="dropAllCategories();">     
                  <?php 
                  $i=1;
                  $checkedCategories=$book->fetchCategories($bid);
                  $ch=$checkedCategories->fetch_all();
                  if(count($ch)!=0):?>
                    <span id="selected" class="w-auto">
                      <?php 
                      foreach ($ch as $val) {
                       $makeId='cid'.$i++;
                       $selectedCategory=$category->fetchCategory($val[1]);
                       $cname= $selectedCategory['category_name']; 
                       $cid= $val[1];
                       ?>
                       <label for="<?=$makeId?>" id="l<?=$makeId?>" class="badge badge-secondary my-auto mx-1"><?=$cname?> <i class="fa fa-times" onclick="deselect('<?=$makeId?>','<?=$cid?>')"></i><input name="<?=$makeId?>" value="<?=$cid?>" id="<?=$makeId?>" type="checkbox" class="cust-hide" checked></label>
                     <?php }
                     ?>
                   </span>
                   <?php else:?>
                    <span id="selected" class="w-auto">Select from here</span>
                  <?php endif;
                  ?>
                  <ul id="listAll" class="cust-hide cust-select">
                    <?php
                    while($categoryFetch=mysqli_fetch_assoc($categories)):  
                      $makeId='cid'.$i;
                      $cname=$categoryFetch['category_name'];
                      $cid=$categoryFetch['cid'];
                      $checkedCategories=$book->fetchCategories($bid);
                      $ch=$checkedCategories->fetch_all();
                      $check=NULL;
                      ?>
                      <?php
                      if(count($ch)==0): ?>
                       <li id='<?php echo "li_".$cid; ?>' onclick="selectMe('<?=$cid?>','<?=$cname?>','<?=$makeId?>')" ><?=$cname?></li>
                     <?php else:
                       foreach ($ch as $val) {
                         if(in_array($cid, $val)):
                          $check=TRUE;
                          ?>
                          <li id='<?php echo "li_".$cid; ?>' onclick="selectMe('<?=$cid?>','<?=$cname?>','<?=$makeId?>')" class='cust-hide'><?=$cname?></li>
                          <?php 
                        endif;
                        ?>
                      <?php } 
                      if(!$check):
                        ?>  
                        <li id='<?php echo "li_".$cid; ?>' onclick="selectMe('<?=$cid?>','<?=$cname?>','<?=$makeId?>')" ><?=$cname?></li> 
                        <?php
                      endif;
                    endif;
                  $i++;
                endwhile;
                ?>
              </ul>
            </span>
          </div>
          <div class="row mb-3"><?php $fetch='../../resources/uploads/'.$cover.".jpg";?>
          <label for="book_cover" class='mx-auto mt-2 align-self-center' >
            <img id="cover_image"  style='height:255px; width:170px;' <?="src='{$fetch}'";?> for='' alt='Book Cover'> 
          </label>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="book_cover" accept="image/*" name="book_cover" onchange="checkFileInput('book_cover')">
          <label class="custom-file-label" for="book_cover">New Book Cover #</label>
          <small class="form-text text-muted ml-1"># Size Must Be Less Than 1MB</small> <small class="form-text text-muted text-danger" id='errorbook_cover'></small>
        </div>
        <input type="hidden" name="bid" value="<?=$bid?>">
        <input type="hidden" name="cover_name" value="<?=$cover?>">
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" onfocus='hideAllCategories()' href='/login?view=books'>Close</a>
        <button type="submit"  onfocus='hideAllCategories()'class="btn btn-cust-primary">Save Changes</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php  require __dir__.'/'.'../../Views/bookCategories/addCategory_form.view.php';?>