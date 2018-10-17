<?php
require_once('includes/sources/head.php');

if(isset($_POST['submit'])){
    $bodyid = $_POST['body'];
    $neckid = $_POST['neck'];
    $headid = $_POST['head'];

    $bprice = $_POST['bodyprice'];
    $nprice = $_POST['neckprice'];
    $hprice = $_POST['headprice'];

    $accountid = $_SESSION['accountid'];

    $total = $bprice + $nprice + $hprice;
    $ordernum = date('YmdHis');

    $sql = "INSERT INTO tbl_customorder (co_no, body_id, head_id, neck_id, account_id, total_price,co_date) VALUES ('$ordernum',$bodyid, $headid, $neckid, $accountid, $total, NOW())";
    $result = mysql_query($sql, $connection) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    body{
        text-align: center;
    }

    .guitar-parts-group{
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
        margin: 0 15px;
        padding: 15px;
    }

    .guitar-container{
        display: inline-block;
        padding: 10px;
        width: 250px;
        height: 300px;
        margin: 10px;
        text-align: center;
        line-height: 1.5rem;
        transition-duration: 350ms;
        transition-property: background, color;
    }

    .guitar-container:hover{
        background: #333;
        color: #fafafa;
        cursor: pointer;
    }

    .img-wrap{
        width: 100%;
        padding: 10px;
    }

    .img-wrap img{
        max-width: 100%;
        height:150px;
    }

    .guitar-combine-img{
        display: inline-block;
        width:30%;

    }

    .guitar-combine-img img{
        max-width: 100%;
    }

</style>
<title>NOF</title>
</head>
<body>
</body>
    <h1>Pick a Combination</h1>
        <div class="guitar-parts-group">
    <h3>Head</h3>
<?php
    $sql = "SELECT id, part_name, thickness, description, image, price FROM tbl_parts WHERE part_type = 1";
    $result = $con->query($sql);
    while ($row = $result->fetch_object()){
        $id = $row->id;
        $product = $row->part_name;
        $thickness = $row->thickness;
        $desc = $row->description;
        $price = $row->price;
        $img_src = $row->image;
        echo'<div class="guitar-container" onclick="headSelect('.$id.')">
                <div class="img-wrap">
                    <img src="../images/'.$img_src.'">
                </div>
                <h3>Product: '.$product.'</h3>
                <p>Thickness: '.$thickness.'</p>
                <p>Description: '.$desc.'</p>
                <p>Price: ₱'.$price.'</p>
            </div>';
    }
?>
    </div>
    <div class="guitar-parts-group">
    <h3>Neck</h3>
<?php
    $sql = "SELECT id, part_name, thickness, description, image, price FROM tbl_parts WHERE part_type = 2";
    $result = $con->query($sql);
    while ($row = $result->fetch_object()){
        $id = $row->id;
        $product = $row->part_name;
        $thickness = $row->thickness;
        $desc = $row->description;
        $price = $row->price;
        $img_src = $row->image;
        echo'<div class="guitar-container" onclick="neckSelect('.$id.')">
                <div class="img-wrap">
                    <img src="../images/'.$img_src.'">
                </div>
                <h3>Product: '.$product.'</h3>
                <p>Thickness: '.$thickness.'</p>
                <p>Description: '.$desc.'</p>
                <p>Price: ₱'.$price.'</p>
            </div>';
    }
?>
    </div>
    <div class="guitar-parts-group">
    <h3>Body</h3>
<?php
    $sql = "SELECT id, part_name, thickness, description, image, price FROM tbl_parts WHERE part_type = 3";
    $result = $con->query($sql);
    while ($row = $result->fetch_object()){
        $id = $row->id;
        $product = $row->part_name;
        $thickness = $row->thickness;
        $desc = $row->description;
        $price = $row->price;
        $img_src = $row->image;
        echo'<div class="guitar-container" onclick="bodySelect('.$id.')">
                <div class="img-wrap">
                    <img src="../images/'.$img_src.'">
                </div>
                <h3>Product: '.$product.'</h3>
                <p>Thickness: '.$thickness.'</p>
                <p>Description: '.$desc.'</p>
                <p>Price: ₱'.$price.'</p>
            </div>';
    }
?>
    </div>
    <div class="guitar-combine">
        <div class="guitar-combine-img">
            <img id="guitar-body-img">
        </div>
        <div class="guitar-combine-img" style=" padding:23px;">
            <img id="guitar-neck-img" style="margin-left:-80px;margin-top:200px; transform:scale(1.22)">
        </div>
        <div class="guitar-combine-img" style="padding:122px;">
            <img id="guitar-head-img"style="margin-left:-300px;margin-top:210px;transform:scale(1.02);">
        </div>
    </div>
    <form method="POST">
        <input type="hidden" required name="body" id="body" value=""/>
        <input type="hidden" required name="bodyprice" id="bodyprice" value=""/>
        <input type="hidden" required name="neck" id="neck" value=""/>
        <input type="hidden" required name="neckprice" id="neckprice" value=""/>
        <input type="hidden" required name="head" id="head" value=""/>
        <input type="hidden" required name="headprice" id="headprice" value=""/>
        <input type="submit" style="height: 40px; background: black; border-color: black; cursor:pointer; color: white; padding: 5px;" name="submit" />
    </form>
    <script>
        function bodySelect(clicked){
            var myRequest = new XMLHttpRequest();
            var url = 'guitarprocess.php';

            var formData = "bodySelect="+clicked;
            
            myRequest.open('POST', url ,true);
            myRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');

            myRequest.onload = function(){
                var response= this.responseText;
                var dataArray= response.split('%|%');
                document.getElementById('guitar-body-img').src=dataArray[0];
                alert(dataArray[0]);
                document.getElementById('body').value = dataArray[1];
                document.getElementById('bodyprice').value = dataArray[2];
            }
            myRequest.send(formData);
        }

        function neckSelect(clicked){
            var myRequest = new XMLHttpRequest();
            var url = 'guitarprocess.php';

            var formData = "neckSelect="+clicked;
            
            myRequest.open('POST', url ,true);
            myRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');

            myRequest.onload = function(){
                var response= this.responseText;
                var dataArray= response.split('%|%');
                document.getElementById('guitar-neck-img').src=dataArray[0];
                document.getElementById('neck').value = dataArray[1];
                document.getElementById('neckprice').value = dataArray[2];
            }
            myRequest.send(formData);
        }
        function headSelect(clicked){
            var myRequest = new XMLHttpRequest();
            var url = 'guitarprocess.php';

            var formData = "headSelect="+clicked;
            
            myRequest.open('POST', url ,true);
            myRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');

            myRequest.onload = function(){
                var response= this.responseText;
                var dataArray= response.split('%|%');
                document.getElementById('guitar-head-img').src=dataArray[0];
                document.getElementById('head').value = dataArray[1];
                document.getElementById('headprice').value = dataArray[2];
            }
            myRequest.send(formData);
        }
    </script>
</html>