<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login To <span class="brand">NOF</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="handlers/forms/login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="user" placeholder="Username" class="form-control">
            </div>  
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" id="password" name="password" placeholder="Password" class="form-control">
            </div>
            
            <input type="submit" value="Login" class="btn btn-success form-control">
        </form>
      </div>
<!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
-->
    </div>
  </div>
</div>