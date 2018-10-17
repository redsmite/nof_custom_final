<?php
    require_once('includes/sources/head.php');
?>

<style>
    #banner{
        background-image: url(../admin/banner.jpg);
        width: 100%;
        height: 100vh;
        background-size: cover;
        
        padding-top:15%;
    }
    
    #banner #header{
        width: 900px;
        margin: 0px auto;
        color: #fff;
        background: rgba(0,0,0,.5);
        padding: 10px;
        text-align: center;
    }
    
    .panel{
        background: #eee;
        padding: 10px;
        border-radius: 5px;
    }
</style>
</head>

<body>
    <?php
        require_once('includes/views/navigation.php');
    ?>

    <!--MARGINS-->
    <div style="margin-bottom:50px;"></div>
    <!--MARGINS-->
    <?php
        require_once('includes/component/popups.php');
    ?>
<!-- Modal -->
    <?php
        require_once('includes/component/modal/modal_login.php');
        require_once('includes/component/modal/modal_register.php');
    ?>
    <div style="margin-bottom:70px;"></div>
    <div class="container">
      <!-- GET ORDER ID -->
        <?php
            $guitar_id = $_GET['guitar_id'];
            $order_id  = $_GET['order_id'];
            $sql = "SELECT a.payment_type as payment_type , a.id as guitar_id ,  h.part_name as hpartname , h.thickness as hthickness , h.description as hdescription , h.image as himage , h.price as hprice , ";

            $sql .=" n.part_name as npartname ,  n.thickness as nthickness , n.description as ndescription , n.image as nmage , n.price as nprice ,";

            $sql .=" b.part_name as bpartname ,  b.thickness as bthickness , b.description as bdescription , b.image as bimage , b.price as bprice , (h.price + n.price + b.price) as total_amount , gb.guitar_name as guitar_name ";

            $sql .=" FROM guitar_builder  as gb left join 
                    (SELECT id,part_name,thickness, description , image , price from tbl_parts
                        where part_type = '1'
                    ) as h on h.id = gb.head_id ";

            $sql .=" left join 
                    (SELECT id, part_name, thickness, description , image , price from tbl_parts
                        where part_type = '2'
                    ) as n on n.id = gb.neck_id ";

            $sql .=" left join 
                    (SELECT id, part_name, thickness, description , image , price from tbl_parts
                        where part_type = '3'
                    ) as b on b.id = gb.body_Id ";
        
            $sql .=" left join guitar_orders as a on gb.id = a.guitar_id ";

            $sql .=" WHERE a.id = '{$order_id}'";

            $query = $con->query($sql);
        
//            echo $sql;
//            die(mysqli_error($con));
            $information = mysqli_fetch_assoc($query);

            $total_amount = $information['total_amount'];
      ?>
        <?php
            $sql = "SELECT * FROM guitar_payments where id ='$order_id'";
        
            $query = $con->query($sql);
//            die(mysqli_error($con));
            if(!$query->num_rows){
                
            }
            
            else{
                $payment = array();
                
                while($row = mysqli_fetch_assoc($query)) {
                    $payment[] = $row;
                }
                
            }
        
        if(isset($payment)) {
            
            print_r($payment);
        }
        ?>
       <h1>Guitar Tracking</h1>
        <div class="modal fade" id="cashPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment (CASH)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="handlers/forms/payment_cash.php" enctype="multipart/form-data">
                    <!---HIDDENS -->
                    
                    <input type="hidden" name="order_id" value="<?php echo $order_id?>">
                    <input type="hidden" name="guitar_id" value="<?php echo $guitar_id?>">
                    <div class="form-group">
                        <label>Sender Name: </label>
                        <input type="text" class="form-control" name="sender_name">
                    </div>
                    <div class="form-group">
                        <label>Amount to Pay </label>
                        <input type="text" class="form-control" name="amount" value="<?php echo $total_amount?>" readonly>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Attach file (Proof of Payment:) </label>
                        <input type="file" name="image">
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h3>Information</h3>
                
                <h4><small>Guitar Name </small>: <?php echo $information['guitar_name']?></h4>
                <h4><small>Amount </small>: <?php echo $information['total_amount']?></h4>
                
                <?php
                    if($information['payment_type'] == '1') {
                        if(isset($payment)) {
                            ?> 
                                <a href="#">Payment Attached</a>
                            <?php
                        }
                        else{
                            ?> 
                             <h4><small>Payment Type : </small> <strong>Cash</strong></h4>
                             <button class="btn btn-warning" data-toggle="modal"
                                    data-target="#cashPayment">Attach Payment</button>
                            <?php
                        }
                    }
                ?>
                
                <?php
                    if ($information['payment_type'] =='2') {
                        ?>
                            <h4><small>Payment Type : </small> <strong>Installment</strong></h4>
                            <h4><small>Amount Paid </small>: <del><?php echo $information['total_amount']?></del> </h4>
                            <h4><small>Balance </small>: <?php echo $information['total_amount']?></h4>

                            <button class="btn btn-warning" data-toggle="modal"
                                    data-target="#attachPayment">Attach Payment</button>
                        <?php
                    }
                ?>
                
            </div>
            
            <div class="col-md-4">
                <h3>Payment</h3>
                <ul class="list-unstyled">
                    <li>Date : Nov16</li>
                    <li>Amount : 300</li>
                    <li>Payment Mode : Onsite</li>
                </ul>
                <hr>
                <ul class="list-unstyled">
                    <li>Date : Nov16</li>
                    <li>Amount : 300</li>
                    <li>Payment Mode : Padala </li>
                    <li>Sender: Mark Angelo</li>
                    <li>Track Number: 09123-12301-31231</li>
                </ul>
            </div>
        </div>
    </div>
<?php
    require_once('includes/sources/foot.php');
?>
</body>
</html>