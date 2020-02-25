<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="form">
   <form action='/logout' method="POST">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Are You Sure, You Want To <b>Logout</b> !</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </form>
</div>
</div>

<div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="form">
   <form action='/delcat' method="POST">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Are You Sure, You Want To Delete "<span id='category_name' class="font-weight-bolder"></span>" Category !</label>
        </div>
        <input type="hidden" name="cid" id='cid'>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </form>
</div>
</div>

<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="form">
   <form action='/delusr' method="POST">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
         <label>Are You Sure, You Want To Delete "<span id='user_name' class="font-weight-bolder"></span>" User !</label>
       </div>
       <input type="hidden" name="uid" id='uid'>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      <button type="submit" class="btn btn-danger">Yes</button>
    </div>
  </div>
</form>
</div>
</div>
<div class="modal fade" id="deleteBookModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="form">
   <form action='/delbook' method="POST">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
         <label>Are You Sure, You Want To Delete "<span id='book_name' class="font-weight-bolder"></span>" Book !</label>
       </div>
       <input type="hidden" name="bid" id='bid'>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      <button type="submit" class="btn btn-danger">Yes</button>
    </div>
  </div>
</form>
</div>
</div>
<?php $aria_value='true';
?>
<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-hidden="">
 <div class="modal-dialog" role="form">
   <form method="POST" action="/send_reset_password_link" onsubmit="return checkFieldEmail('resemailid')">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reset Your Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
         <input type="email" class="form-control mt-3" name="resemailid" id="resemailid"  placeholder="Enter Email Address *" onkeyup="checkFieldEmail('resemailid')">
         <small class="form-text text-muted text-danger"
         id='errorresemailid'></small>
       </div>
     </div>
     <div class="modal-footer">
      <button class="btn btn-primary" type="submit">Get Password Reset Email</button>
    </div>
  </div>
</form>
</div>
