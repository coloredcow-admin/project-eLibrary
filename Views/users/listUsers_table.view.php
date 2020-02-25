 <form accept="/" method="POST">
          <div class="text-right position-relative" style="top:-40px;"><label for='limit'>Showing:</label> 
            <select style="width:40px;" name='limit' onchange="this.form.submit()">
              <?php 
              if($limit>10 && $limit!=$total) echo "<option value='".($limit-10)."'>".($limit-10)."</option>";
              if($limit>5 && $limit!=$total)  echo "<option value='".($limit-5)."'>".($limit-5)."</option>";
              echo "<option value='{$limit}' selected>$limit</option>";
              if($limit<20 && $limit!=$total) echo "<option value='".($limit+5)."'>".($limit+5)."</option>"; 
              if($limit<=10 && $limit!=$total) echo "<option value='".($limit+10)."'>".($limit+10)."</option>";
              if($limit<=5 && $limit!=$total) echo "<option value='".($limit+15)."'>".($limit+15)."</option>";?>
            </select> of <?=$total?></div>
          <div class="table-responsive position-relative" style="top:-35px;">
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th scope="col">#</th>
                  <th scope="col" class="text-left">Full Name</th>
                  <th scope="col">No. of Books Read</th>
                  <th scope="col">Account Created</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
               <?php
               $i=0+$offset;
               while($row=mysqli_fetch_assoc($rows)):
                if($row['type']!=0):
                  $no_of_books_read=mysqli_num_rows($user->fetchBooks($row['uid']));
                  ?>
                  <tr>
                    <th class="text-center"><?=++$i?></th>
                    <td><?=$row['user_name'] ?></td>
                    <td class="text-center"><?=$no_of_books_read ?></td>
                    <td class="text-center"><?=$row['last_login'] ?></td>
                    <td class="text-center">
                       <a href='javascript:void(0)' class="text-danger" data-toggle="modal" data-target="#deleteUserModal" data-uname="<?=$row['user_name']?>" data-uid="<?=$row['uid']?>"><?php if($row['type']!='0') echo "<i class='fa fa-trash-alt'></i>";?></a>
                    </td> 
                  </tr>
                  <?php
                endif;
              endwhile;
              ?>  
            </tbody>
          </table>
        </div>
        <div> <?php if($i==0)
              echo "<h4 class='text-muted text-center'>No Records Found</h4>";?></div>
        <div class="row col-6 offset-6">
          <?php 
          if(($i-$limit)>0):
            $offset1=$offset-$limit;
            ?><a href="/login?offset=<?=$offset1 ?>" class='col text-center ml-5 form-control'>Previous</a><?php endif;?>
            <?php  if(($i+1)<$total):
              $offset2=$offset+$limit;
              ?><a href="/login?offset=<?=$offset2?>" class='form-control text-center mr-5 col '>Next</a>
            <?php endif;?>
          </div>
        </form>
      </div>
    </div>