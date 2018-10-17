 <?php
    if(Session::exists('message')) {

        $message = Session::get('message');

        $type    = Session::get('message_type');

        Session::remove('message');
        Session::remove('message_type');
        
        
        ?> 

            <div class="alert alert-<?php echo $type?>">
                <h3 class="close">&times;</h3>
                <p>
                    <?php echo $message;?>
                </p>
            </div>
        <?php
    }
?>