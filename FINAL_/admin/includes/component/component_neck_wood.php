 <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#neckWood" aria-expanded="true" aria-controls="neckWood">
          Neck Wood
        </button>
      </h5>
    </div>

    <div id="neckWood" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <?php
        
       $sql = getParts(2);
        
       $query = $con->query($sql);
        
       if($query->num_rows){
           ?> 
           <div class="row">
            <?php       
             while($row = mysqli_fetch_assoc($query)) :
            ?> 
            <a href="component.php?id=<?php echo $row['id']?>">
                <div class="widget">
                   <img src="../images/<?php echo $row['image']?>">
                   <div>
                        <ul class="list-unstyled">
                            <li><span>Name : </span> <label><?php echo $row['part_name']?></label></li>
                            <li><span>Thickness : </span> <label><?php echo $row['thickness']?></label></li>
                             <li><span>Price : </span> <label><?php echo $row['price']?></label></li>
                        </ul> 
                    </div>
                 </div>   
            </a>
            <?php
           endwhile;
            ?>        
        </div>
            <?php
       }
        
    ?>
    </div>
</div>