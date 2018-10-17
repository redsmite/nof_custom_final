<?php	
require_once('../dependencies.php');

if(isset($_POST['bodySelect'])){
	$id = $_POST['bodySelect'];

	$sql = "SELECT price, image FROM tbl_parts WHERE id = $id";
    $result = $con->query($sql);
    $row = $result->fetch_object();
    $img_src = $row->image;
    $price = $row->price;

    echo '../images/'.$img_src.'%|%';
    echo $id.'%|%';
    $_SESSION['body'] = $price;
    echo number_format($price,2).'%|%';;
    $total = $_SESSION['body']+$_SESSION['neck']+$_SESSION['head'];
    echo '<b>'.number_format($total,2).'</b>';
}

if(isset($_POST['neckSelect'])){
	$id = $_POST['neckSelect'];

	$sql = "SELECT price, image FROM tbl_parts WHERE id = $id";
    $result = $con->query($sql);
    $row = $result->fetch_object();
    $img_src = $row->image;
    $price = $row->price;

    echo '../images/'.$img_src.'%|%';

    echo $id.'%|%';
    $_SESSION['neck'] = $price;
    echo number_format($price,2).'%|%';;
    $total = $_SESSION['body']+$_SESSION['neck']+$_SESSION['head'];
    echo '<b>'.number_format($total,2).'</b>';
}

if(isset($_POST['headSelect'])){
	$id = $_POST['headSelect'];

	$sql = "SELECT price, image FROM tbl_parts WHERE id = $id";
    $result = $con->query($sql);
    $row = $result->fetch_object();
    $img_src = $row->image;
    $price = $row->price;
    
    echo '../images/'.$img_src.'%|%';

    echo $id.'%|%';
    $_SESSION['head'] = $price;
    echo number_format($price,2).'%|%';;
    $total = $_SESSION['body']+$_SESSION['neck']+$_SESSION['head'];
    echo '<b>'.number_format($total,2).'</b>';
}

if(isset($_POST['submitGuitar'])){
    $name = Filters::str($_POST['submitGuitar']);
    $head = $_POST['builderHead'];
    $neck = $_POST['builderNeck'];
    $body = $_POST['builderBody'];
    $total = $_POST['builderTotal'];
    // SESSION ID
    $client_id = $_SESSION['user_id'];

    $sql = "INSERT INTO guitar_builder (head_id, neck_id, body_id, amount, client_id, guitar_name) VALUES ($head, $neck, $body, $total, $client_id, '$name')";
    $result = $con->query($sql);
    echo 'success';
}
?>