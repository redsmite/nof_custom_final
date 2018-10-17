<?php
    require_once('includes/sources/head.php');
?>
</head>

<body>
    <?php
        require_once('includes/views/navigation.php');
    ?>

    <div class="container">
    <!--MARGINS-->
    <div style="margin-bottom:50px;"></div>
    <!--MARGINS-->   
    <div class="row">
        
        <!-- aside -->
        <?php
            include_once('includes/views/aside.php');
        ?>  
        
        <!-- aside -->
        
        <!-- main-content -->
        <div class="col-lg-9">
          <div>
              <?php
                $sql = "SELECT a.* ,
                    case when a.status = '1' then 'pending'
                         when a.status = '2' then 'accepted'
                         end as status ,
                    case when a.payment_type = '1' then 'cash'
                         when a.payment_type = '2' then 'installment'
                         end as payment_type , concat(fname, ' ' ,lname) 
                    
                        as fullname FROM guitar_orders a
                
                    left join tbl_accs on tbl_accs.id = a.client_id";
                $query = $con->query($sql);
//                die(mysqli_error($con));
                if(!$query->num_rows) {
 
                }
              
                else {
                    ?> 
                    <table class="table">
                        <thead>
                            <th>Client Name</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Date Ordered</th>
                        </thead>
                        
                        <tbody>
                            <?php
                                while($row = mysqli_fetch_assoc($query)) :
                                    ?> 
                                     <tr>
                                        <td><?php echo $row['fullname']?></td>
                                         <td><?php echo $row['status']?></td>
                                         <td><?php echo $row['amount']?></td>
                                         <td><?php echo $row['payment_type']?></td>
                                         <td><?php echo $row['date_ordered']?></td>
                                    </tr>
                                    <?php
                                endwhile;
                            ?>
                        </tbody>
                    </table>
                    <?php
                }
              ?>
          </div>
          <!-- /.row -->

        </div>
    </div>
        
<?php
    require_once('includes/sources/foot.php');
?>
</body>
</html>