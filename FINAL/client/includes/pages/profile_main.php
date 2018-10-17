<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#guitars" role="tab" aria-controls="home" aria-selected="true">Guitars</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="profile" aria-selected="false">Orders</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#history" role="tab" aria-controls="contact" aria-selected="false">History</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="guitars" role="tabpanel" aria-labelledby="home-tab">
        <?php
            include_once('includes/component/profile_guitars.php');
        ?>
    </div>
  <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="profile-tab">Orders</div>
  <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="contact-tab">History</div>
</div>