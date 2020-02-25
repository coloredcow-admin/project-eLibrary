 <div class="table-responsive mx-0" >
  <table class="table table-striped">
    <thead>
      <tr class="text-center">
        <th scope="col">#</th>
        <th scope="col" class="text-left">Book Name</th>
        <th scope="col" class="text-left">Author Name</th>
        <th scope="col">Time</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody >
      <?php $i=0;
      $book = new Books;
      while($bok=mysqli_fetch_assoc($readBookss)):  
        $bid=$bok['bid'];
        $time=$bok['transaction_time'];
        $row=$book->fetchBook($bid);
        ?>
        <tr>
          <th class="text-center"><?=++$i?></th>
          <td><?=$row['book_name'] ?></td>
          <td><?=$row['author_name'] ?></td>
          <td class="text-center"><?=$time ?></td> 
          <td class="text-center">
            <?php $lnk='/readbook?dbid='.$bid; ?> 
            <a href="<?=$lnk?>" class='card-link text-danger'> <i class="fa fa-times-circle"></i></a>
          </td> 
        </tr>
      <?php endwhile;
      ?>
    </tbody>
  </table>
  <?php  if($i==0):?>
   <h4 class="text-center mt-5 pt-5" style="color:#aaa;">You haven't read any book yet.</h4>
 <?php endif; ?>
</div>   
