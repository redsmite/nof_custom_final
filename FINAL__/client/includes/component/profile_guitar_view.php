<?php
    $id = $_GET['id'];

    $sql = "SELECT a.id as guitar_id ,  h.part_name as hpartname , h.thickness as hthickness , h.description as hdescription , h.image as himage , h.price as hprice , ";

    $sql .=" n.part_name as npartname ,  n.thickness as nthickness , n.description as ndescription , n.image as nmage , n.price as nprice ,";

    $sql .=" b.part_name as bpartname ,  b.thickness as bthickness , b.description as bdescription , b.image as bimage , b.price as bprice , (h.price + n.price + b.price) as total_amount ";

    $sql .=" FROM guitar_builder as a left join 
    
            (SELECT id,part_name,thickness, description , image , price from tbl_parts
                where part_type = '1'
            ) as h on h.id = a.head_id ";

    $sql .=" left join 
            (SELECT id, part_name, thickness, description , image , price from tbl_parts
                where part_type = '2'
            ) as n on n.id = a.neck_id ";

    $sql .=" left join 
            (SELECT id, part_name, thickness, description , image , price from tbl_parts
                where part_type = '3'
            ) as b on b.id = a.body_Id ";

    $sql .=" WHERE a.id = '{$id}'";

    $query = $con->query($sql);
    
    $result = mysqli_fetch_assoc($query);
    
    $total_amount = $result['total_amount'];
?>

    <!-- Button trigger modal -->
<br/>
<button class="btn btn-warning" onclick="goBack()">Return</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Order
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="handlers/forms/order.php">
            
            <!-- HIDDEN -->
            <input type="hidden" name="guitar_id" value="<?php echo $id?>"> 
            <input type="hidden" name="amount" value="<?php echo $total_amount?>"> 
            <div class="form-group">
                
                <label for="cash">Cash</label>
                <input type="radio" value="2" name="payment" id="cash" onclick="toggle('containercash')">
                
                
                <label for="installment">Installment</label>
                <input type="radio" value="1" name="payment" id="installment" onclick="toggle('containerinstallment')">
                <!-- -->
                
            </div>  
              <!-- DISPLAY IF PAYMENT IS CASH-->          
            <div id="containercash" class="hidden">
                <h4>Cash</h4>
                <label>Total Amount : <?php echo $total_amount?></label>
                <p>
                    <small>
                        You can send your payments Via Padals eg(palawan, western union)
                    </small>
                </p>
                
                <input type="submit" name="btncash" value="Proceed" class="btn btn-warning">
            </div>
            <!-- -->
            <!-- Display if payment is installment -->
            <div id="containerinstallment" class="hidden">
                <h4>Installment</h4>
                <label>Total Amount : <?php echo $total_amount?></label>
                <p>
                    You must pay <strong>atleast 30%</strong> of the <strong>total amount (500 * .30)</strong>
                        Within <strong>6 months</strong>
                    <br/>
                    <small>
                        You can send your payments Via Padals eg(palawan, western union)
                    </small>
                </p>
                
                <input type="submit" name="btninstallment" value="Proceed" class="btn btn-warning">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <div>
        <h1>Guitar Picture Combined</h1>
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
    </div>
    <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Head Information And Costing
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-unstyled">
            <li><img src="../images/<?php echo $result['himage']?>" class="rotate"></li>
            <li><span>Wood Name: </span> <?php echo $result['hpartname']?></li>
            <li><span>Thickness: </span> <?php echo $result['hthickness']?></li>
            <li><span>Price: </span> <?php echo $result['hprice']?></li>
            <li><span>Description: </span> <?php echo $result['hdescription']?></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Neck Information And Costing
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
           <ul class="list-unstyled">
                <li><img src="../images/<?php echo $result['nmage']?>" class="rotate"></li>
                <li><span>Wood Name: </span> <?php echo $result['npartname']?></li>
                <li><span>Thickness: </span> <?php echo $result['nthickness']?></li>
                <li><span>Price: </span> <?php echo $result['nprice']?></li>
                <li><span>Description: </span> <?php echo $result['ndescription']?></li>
            </ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Body Information And Costing
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
       <ul class="list-unstyled">
            <li><img src="../images/<?php echo $result['bimage']?>" class="rotate"></li>
            <li><span>Wood Name: </span> <?php echo $result['bpartname']?></li>
            <li><span>Thickness: </span> <?php echo $result['bthickness']?></li>
            <li><span>Price: </span> <?php echo $result['bprice']?></li>
            <li><span>Description: </span> <?php echo $result['bdescription']?></li>
        </ul>
      </div>
    </div>
  </div>
</div>