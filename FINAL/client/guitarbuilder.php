<?php
    require_once('includes/sources/head.php');
    $_SESSION['body'] = 0;
    $_SESSION['neck'] = 0;
    $_SESSION['head'] = 0;
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

    .guitar-parts-group{
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
        margin: 0 15px;
        padding: 15px;
        text-align: center;
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

    .guitar-combine{
        z-index: 50;
        position: fixed;
        right: 0;
        bottom: 0;
        border: 1px solid #fafafa;
        transform: scale(0.8);
        background: rgba(0,0,0,0.8);
        box-shadow: 0 0 15px rgba(255,255,255,0.8);
        padding: 2em;
        border-radius: 20px;
    }

    .guitar-combine-img{
        display: inline-block;
        width:30%;
    }

    .guitar-combine-img img{
        max-width: 100%;
    }
    #guitar-body-img{
        margin-left: 102px;
    }
    #guitar-head-img{
        margin-left: -102px;
        margin-bottom: -2px;
        z-index: 10;
    }
    .hide{
        float: right;
        color: #fafafa;
        padding-right: 5px;
        cursor: pointer;
    }
    #show-guitar{
        position: fixed;
        left: 0;
        bottom: 0;
        background: rgba(0,0,0,0.8);
        width: 125px;
        border-radius: 10px;
        color: #fafafa;
        padding: 10px;
        display: none;
        cursor: pointer;
    }
    #price{
        color: #fafafa;
        float: right;
    }
    #submit-guitar{
        background: #ccc;
        color: #333;
        border-radius: 8px;
        border: 1px solid #fafafa;
        box-shadow: 0 0 15px rgba(255,255,255,0.8);
        padding: 0.5em 1.5em;
        font-size: 2rem;
        cursor: pointer;
        margin-top: 10px;
    }
    .guitar-name{
        color: #fafafa;
        font-size: 2rem;
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
        <div class="hide" onclick="hideGuitar()">Hide</div>
        <div class="guitar-combine-img">
            <img id="guitar-body-img">
        </div>
        <div class="guitar-combine-img">
            <img id="guitar-neck-img">
        </div>
        <div class="guitar-combine-img">
            <img id="guitar-head-img">
        </div>
        <p class="guitar-name">Guitar Name: <input type="text" id="guitar-name" /></p>
        <div id="price">
            <div id="head-price"></div>
            <div id="neck-price"></div>
            <div id="body-price"></div>
            <p><b>Total: </b><span id="guitar-total"></span></p>
            <div id="submit-guitar" onclick="submitGuitar()">Order</div>
            <input type="hidden" id="head-id" />
            <input type="hidden" id="neck-id" />
            <input type="hidden" id="body-id" />
        </div>
    </div>
    <div id="show-guitar" onclick="showGuitar()">Show Guitar</div>
    <script>
        function bodySelect(clicked){
            var myRequest = new XMLHttpRequest();
            var url = 'handlers/ajaxs/guitarprocess.php';

            var formData = "bodySelect="+clicked;
            
            myRequest.open('POST', url ,true);
            myRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');

            myRequest.onload = function(){
                var response= this.responseText;
                var dataArray= response.split('%|%');
                document.getElementById('guitar-body-img').src=dataArray[0];
                document.getElementById('body-id').value=dataArray[1];
                document.getElementById('body-price').innerHTML = dataArray[2];
                document.getElementById('guitar-total').innerHTML = dataArray[3];
            }
            myRequest.send(formData);
        }

        function neckSelect(clicked){
            var myRequest = new XMLHttpRequest();
            var url = 'handlers/ajaxs/guitarprocess.php';

            var formData = "neckSelect="+clicked;
            
            myRequest.open('POST', url ,true);
            myRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');

            myRequest.onload = function(){
                var response= this.responseText;
                var dataArray= response.split('%|%');
                document.getElementById('guitar-neck-img').src=dataArray[0];
                document.getElementById('neck-id').value=dataArray[1];
                document.getElementById('neck-price').innerHTML = dataArray[2];
                document.getElementById('guitar-total').innerHTML = dataArray[3]
            }
            myRequest.send(formData);
        }
        function headSelect(clicked){
            var myRequest = new XMLHttpRequest();
            var url = 'handlers/ajaxs/guitarprocess.php';

            var formData = "headSelect="+clicked;
            
            myRequest.open('POST', url ,true);
            myRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');

            myRequest.onload = function(){
                var response= this.responseText;
                var dataArray= response.split('%|%');
                document.getElementById('guitar-head-img').src=dataArray[0];
                document.getElementById('head-id').value=dataArray[1];
                document.getElementById('head-price').innerHTML = dataArray[2];
                document.getElementById('guitar-total').innerHTML = dataArray[3]
            }
            myRequest.send(formData);
        }
        function hideGuitar(){
            var div = document.querySelector('.guitar-combine');
            var button = document.getElementById('show-guitar');
            div.style.display = 'none';
            button.style.display = 'block';
        }
        function showGuitar(){
            var div = document.querySelector('.guitar-combine');
            var button = document.getElementById('show-guitar');
            div.style.display = 'block';
            button.style.display = 'none';
        }
        function submitGuitar(){
            var body = document.getElementById('body-id').value;
            var neck = document.getElementById('neck-id').value;
            var head = document.getElementById('head-id').value;
            var total = document.getElementById('guitar-total').innerText;
            total = total.replace(/\,/g,'');
            var guitar_name = document.getElementById('guitar-name').value;
            if(body != "" && neck != "" && head != "" && guitar_name != ""){
                var myRequest = new XMLHttpRequest();
                var url = 'handlers/ajaxs/guitarprocess.php';

                var formData = "submitGuitar="+guitar_name+"&builderHead="+head+"&builderNeck="+neck+"&builderBody="+body+"&builderTotal="+total;
                
                myRequest.open('POST', url ,true);
                myRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');

                myRequest.onload = function(){
                    var response= this.responseText;
                    alert(response);
                }
                myRequest.send(formData);
            }else{
                alert("Please select all three parts and name your guitar");
            }
        }
    </script>
</html>