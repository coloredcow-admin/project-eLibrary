     <div class="position-relative offset-xl-8 offset-lg-7 mt-5 mt-md-0 pt-md-0 offset-md-7 offset-sm-5 offset-2 pt-2" style="top:-45px">
       <form accept="/" method="POST">
        <?php
        $ChangesAllowed=TRUE;
        if(isset($bookIds)){
          $limit=count($bookIds);
          $ChangesAllowed=FALSE;
        }
        ?>
        <div class="d-inline col text-center m-3">
          <label for='limit'>Showing:</label> 
          <select style="width:50px;" name='limit' onchange="this.form.submit()">
            <?php 
            if($limit>3 && $ChangesAllowed)  echo "<option value='".(($limit-3)-($limit-3)%3)."'>".(($limit-3)-($limit-3)%3)."</option>";
            echo "<option value='{$limit}' selected>$limit</option>";
            if($limit<18 && $ChangesAllowed) echo "<option value='".(($limit+3)-($limit+3)%3)."'>".(($limit+3)-($limit+3)%3)."</option>"; 
            if($limit<=12 && $ChangesAllowed) echo "<option value='".(($limit+12)-($limit+12)%3)."'>".(($limit+12)-($limit+12)%3)."</option>";
            if($limit<=3 && $ChangesAllowed) echo "<option value='".(($limit+12)-($limit+12)%3)."'>".(($limit+12)-($limit+12)%3)."</option>";?>
          </select> entries of <?=$total?></div>  
        </form>
      </div>
      <?php if($_SESSION['type']=='inreader'):?>
        <div class="position-relative offset-xl-7 offset-lg-6 offset-md-7 offset-sm-4 mb-5 px-4 mt-0 pt-0 mt-md-3 pt-md-0 pt-md-2 w-auto" style="top:-28px;">
         <?php if(isset($_SESSION['category_name'])):?>
         <?php endif;?>
         <?php require __dir__.'/'.'../bookCategories/filterCategory_form.view.php';?></div>
       <?php endif;?>
       <div class='row mt-2 px-4 mt-md-5 position-relative' style="top:-45px;">
        <?php $i=0;
        while($row=mysqli_fetch_assoc($rows)):
          if(isset($bookIds)):
            if(in_array($row['bid'], $bookIds)):
             $i++;
             ?>
             <div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 mx-auto  card-group">
              <div class="card  flex-md-row mb-4">
                <?php $fetch='../../resources/uploads/'.$row['cover_image_name'].".jpg";
                $bid=$row['bid'];
                $uid=$_SESSION['uid'];
                $myCategories=$book->fetchCategories($bid);
                ?>
                <div class="align-self-center m-2">
                  <img class='' style="height: 255px; width: 170px;" height=255 width=170  <?="src='{$fetch}'";?> alt='Book Cover'>  
                </div>
                <div class="card-body d-flex flex-column text-md-left text-center">
                  <h4 class="mb-0">
                    <strong class="d-inline-block mb-2"><?=$row['book_name'] ?></strong>
                  </h4>
                  <div class="text-dark"><?=$row['edition'] ?></div>
                  <div class="mb-1 text-muted">by <?=$row['author_name'] ?></div>
                  <p class="card-text mb-auto">
                    <?php 
                    while($myCategory=mysqli_fetch_assoc($myCategories)):
                      $cid=$myCategory['cid'];
                      $category=new Categories();
                      $category=$category->fetchCategory($cid);
                      $cname=$category['category_name'];
                      ?>
                      <span class="mx-auto card-text badge badge-secondary"><?=$cname ?></span> 
                    <?php endwhile;?>
                  </p>
                  <div class="card-text mb-auto" id="<?php echo "read_type".$bid;?>">
                    <?php 
                    if($_SESSION['type']=='inreader'): 
                      $booksRead=$user->fetchBooks($uid);
                      $ch=$booksRead->fetch_all();
                      $check=NULL;
                      foreach ($ch as $val) {
                       if(in_array($bid, $val))
                         $check='checked';
                     }
                     if(!$check): ?>
                      <a href='javascript:void(0);' onclick="readBook('<?=$bid?>');" class='mx-auto badge badge-light badge-pill p-2 text-muted' style="font-size: 0.9rem;" title='mark as read'><i class="fa fa-book-reader"></i> Read</a>
                      <?php else:   ?> 
                        <a  class='mx-auto badge badge-primary badge-pill p-2'  title='Uncheck from read list' href='javascript:void(0);' onclick="unreadBook('<?=$bid?>');" style="font-size: 0.9rem;">Read <i class="fa fa-times"></i></a>
                      <?php endif; ?> 
                      <?php 
                    endif; ?> 
                    <?php if($_SESSION['type']=='inadmin'): ?>
                      <a <?="href='/editbook?bid={$bid}'"?> class='mx-auto card-link' title='edit this book'><i class="fa fa-edit">  </i></a>
                      <a href='javascript:void(0)' class="text-danger" data-toggle="modal" data-target="#deleteBookModal" data-bname="<?=$row['book_name']?>" data-bid="<?=$bid?>" title='delete this book'>Delete</a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endif;
        else:
          $i++;
          ?>
          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-9 mx-auto card-group">
            <div class="card flex-md-row mb-4">
              <?php $fetch='../../resources/uploads/'.$row['cover_image_name'].".jpg";
              $bid=$row['bid'];
              $uid=$_SESSION['uid'];
              $myCategories=$book->fetchCategories($bid);
              ?>
              <div class="align-self-center m-2">
                <img class='' style="height: 255px; width: 170px;" height=255 width=170  <?="src='{$fetch}'";?> alt='Book Cover'>  
              </div>
              <div class="card-body d-flex flex-column text-md-left text-center">
                <h4 class="mb-0">
                  <strong class="d-inline-block mb-2"><?=$row['book_name'] ?></strong>
                </h4>
                <div class="text-dark"><?=$row['edition'] ?></div>
                <div class="mb-1 text-muted">by <?=$row['author_name'] ?></div>
                <p class="card-text mb-auto">
                  <?php 
                  while($myCategory=mysqli_fetch_assoc($myCategories)):
                    $cid=$myCategory['cid'];
                    $category=new Categories();
                    $category=$category->fetchCategory($cid);
                    $cname=$category['category_name'];
                    ?>
                    <span class="mx-auto card-text badge badge-secondary"><?=$cname ?></span> 
                  <?php endwhile;?>
                </p>
                <div class="card-text mb-auto" id="<?php echo "read_type".$bid;?>">
                  <?php if($_SESSION['type']=='inreader'): 
                    $booksRead=$user->fetchBooks($uid);
                    $ch=$booksRead->fetch_all();
                    $check=NULL;
                    foreach ($ch as $val) {
                     if(in_array($bid, $val))
                       $check='checked';
                   }
                   if(!$check): ?>
                    <a href='javascript:void(0);' onclick="readBook('<?=$bid?>');" class='mx-auto badge badge-light badge-pill p-2 text-muted' style="font-size: 0.9rem;" title='mark as read'><i class="fa fa-book-reader"></i> Read</a>
                    <?php else:   ?> 
                      <a  class='mx-auto badge badge-primary badge-pill p-2'  title='Uncheck from read list' href='javascript:void(0);' onclick="unreadBook('<?=$bid?>');" style="font-size: 0.9rem;">Read <i class="fa fa-times"></i></a>
                    <?php endif; ?> 
                    <?php 
                  endif; ?>
                  <?php if($_SESSION['type']=='inadmin'): ?>
                    <div class="row"> 
                      <a <?="href='/editbook?bid={$bid}'"?> class='text-primary text-center col' title='edit this book'><i class="fa fa-edit"></i> </a>
                      <a href='javascript:void(0)' class="text-danger text-center col" data-toggle="modal" data-target="#deleteBookModal" data-bname="<?=$row['book_name']?>" title='this is book' data-bid="<?=$bid?>"> <i class="fa fa-trash-alt"> </i></a>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        <?php  endif; 
      endwhile;
      if($i==0): ?>
        <h4 class="mx-auto mt-5 pt-5" style="color:#aaa;">No Books Found</h4>
      <?php endif;?>
    </div>
    <?php if(!isset($bookIds) && $i!=0):?>
      <div class="row col-3 mx-auto py-3">
        <?php 
        if(($offset-$limit)>=0):
          $offset1=$offset-$limit;
          ?><a href="/login?view=books&offset=<?=$offset1 ?>" class='col-auto col-xl-5 col-lg-5 col-md-7 text-center mx-auto form-control ' title='show previous result'>Previous</a><?php endif;?>
          <?php  if(($offset+$limit)<$total):
            $offset2=$offset+$limit;
            ?><a href="/login?view=books&offset=<?=$offset2?>" class='form-control text-center mx-auto col-auto col-xl-5 col-lg-5 col-md-7' title='show next results'>Next</a>
          <?php endif;?>
        </div>
      <?php endif;?>
    </div>
  </div>
  <style>
    @media only screen and (max-width: 575px) {
      #btn-addBook{
        margin-top:125px;
        margin-left: 45px;
        width:81%; 
      }  
    }

  </style>