<?php	
	require_once('includes/sources/head.php');

if(isset($_POST['bodySelect'])){
	$id = $_POST['bodySelect'];

	$sql = "SELECT price, image FROM tbl_parts WHERE id = $id";
    $result = $con->query($sql);
    $row = $result->fetch_object();
    $img_src = $row->image;
    $price = $row->price;

    echo '../images/'.$img_src.'%|%';

    echo $id.'%|%';
    echo $price;
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
    echo $price;
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
    echo $price;
}
?>