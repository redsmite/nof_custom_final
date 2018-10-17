<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Nof Guitar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="guitarbuilder.php" target="_blank">Customize
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="news.php">News</a>
            </li>
            <?php
                if(!Session::exists('user_id')) {
                    ?> 
                        <li class="nav-item">
                          <a class="btn btn-success" href="#" data-toggle="modal" data-target="#modalLogin">Login</a>
                        </li>
                          &nbsp;
                        <li class="nav-item">
                          <a class="btn btn-danger" href="#sign_up">Register</a>
                        </li>
                    <?php
                }  
              else{
                  ?> 
                    <li class="nav-item">
              <!-- DROPDOWN -->
                <div class="btn-group">
                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My Account
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="#">My Guitars</a>
                    <a class="dropdown-item" href="#">Orders</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                  </div>
                </div>
            </li>
                <?php
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>