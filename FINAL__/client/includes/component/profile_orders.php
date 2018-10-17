<?php
    $sql = "SELECT a.guitar_id as guitarid , a.id as orderid , a.amount as amount , a.payment_type as payment , a.date_ordered as dateordered , 
                        case 
                        when a.status = '1' then 'pending'
                        when a.status = '2' then 'accepted'
                        end as status , 
                        case 
                        when a.payment_type ='1' then 'cash'
                        when a.payment_type ='2' then 'installment'
                        end as payment_type , 
    b.guitar_name as guitarname   FROM guitar_orders as a 
    left join guitar_builder as b on b.id = a.guitar_id where a.client_id = '{$_SESSION['user_id']}' order by a.status desc";

    $query = $con->query($sql);
?>

<table class="table">
    <thead>
        <th>Guitar Name</th>
        <th>Status</th>
        <th>Payment Type</th>
        <th>Amount</th>
        <th>Action</th>
    </thead>
    
    <tbody>
        <?php
            while($row = mysqli_fetch_assoc($query)) :
                ?> 
                    <tr>
                        <td><?php echo $row['guitarname']?></td>
                        <td><?php echo $row['status']?></td>
                        <td><?php echo $row['payment_type']?></td>
                        <td><?php echo $row['amount']?></td>
                        <td><a href="guitar_tracking.php?order_id=<?php echo $row['orderid']?>&guitar_id=<?php echo $row['guitarid']?>" class="btn btn-info">View</a></td>
                    </tr>
                <?php
            endwhile;
        ?>
    </tbody>
</table>