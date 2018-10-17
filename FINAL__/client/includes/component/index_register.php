<form action="handlers/forms/register.php" method="POST" enctype="multipart/form-data">
    <div class="panel">
        <h3 id="sign_up">Sign up</h3>    
    </div>
    <div class="well">
        <h4>Personal</h4>

          <div class="form-group">
            <label for="username">Profile Picture</label>
            <input type="file" id="img" name="img">
        </div> 
        <div class="form-group">
            <label for="username">Firstname</label>
            <input type="text" id="username" name="fname" placeholder="Firstname" class="form-control">
        </div> 
        <div class="form-group">
            <label for="username">Lastname</label>
            <input type="text" id="username" name="lname" placeholder="Lastname" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="male">Male</label>
            <input type="radio" id="male" name="gender" value="m" checked>
            <label for="female">Female</label>
            <input type="radio" id="female" name="gender" value="f">
        </div>
        
        
    </div>
    <div class="well">
        <h4>Credentials</h4>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Email" class="form-control">
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" placeholder="Contact" class="form-control">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" class="form-control">
        </div>  
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" id="password" name="password" placeholder="Password" class="form-control">
        </div>


         <div class="form-group">
            <label for="password">Address</label>
            <textarea class="form-control" rows="10" name="address">

            </textarea>
        </div>
    </div>

    <input type="submit" value="Login" class="btn btn-success form-control">
</form>