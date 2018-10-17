 <?php
    if(Session::exists('message')) {

        $message = Session::get('message');

        $type    = Session::get('message_type');

        Session::remove('message');
        Session::remove('message_type');
        
        
        ?> 
            <div class="alert alert-<?php echo $type;?> alert-dismissible fade show" role="alert">
               <p>
                <strong>System Message </strong> <?php echo $message;?>
              </p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <?php
    }
?>