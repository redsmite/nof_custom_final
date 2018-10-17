<?php

    $sql = "SELECT a.id as guitar_id , a.* ,(SELECT image from tbl_parts where part_type = '1' and id= a.head_id) as head, 
    (SELECT image from tbl_parts where part_type = '2' and id= a.neck_id) as neck, 
    (SELECT image from tbl_parts where part_type = '3' and id= a.body_id) as body 
    
    from guitar_builder as a
    where client_id ='{$_SESSION['user_id']}'";

    $query = $con->query($sql);
    if(!$query->num_rows){
        echo "No Guitars";
    }
    else{
        while($row = mysqli_fetch_assoc($query)) :
            ?> 
            <a href="profile.php?view=guitar&id=<?php echo $row['guitar_id']?>">
            <div class="guitar-combine">
                <div class="guitar-combine-img">
                    <img id="guitar-body-img" src="../images/5bc4ca3cdb8812.58251953.png">
                </div>
                <div class="guitar-combine-img">
                    <img id="guitar-neck-img" src="../images/5bc520aee28370.32204447.png">
                </div>
                <div class="guitar-combine-img">
                    <img id="guitar-head-img" src="../images/5bc4ce51118ab1.91776439.png">
                </div>
            </div>
            </a>
            <?php
        endwhile;
    }
?>