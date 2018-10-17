<?php
    require_once('includes/sources/head.php');
?>
<style>
    .update-button{
        background: #334E58;
        color: #fafafa;
        border-radius: 8px;
        border: 1px solid #fafafa;
        box-shadow: 0 0 15px rgba(0,0,0,0.8);
        padding: 5px;
        width: 65px;
        text-align: center;
        cursor: pointer;
    }
    #modal{
        display: none;
        background: rgba(0,0,0,0.9);
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        z-index: 2000;
    }
    #close{
        font-size: 2rem;
        color: #fafafa;
        float: right;
        padding-right: 5%;
        cursor: pointer;
    }
    #content{
        color: #fafafa;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
</style>
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
        <form action="handlers/forms/post_services.php" method="post">
            <h1>Post Services</h1>
            <p>Service Name:</p>
            <p><input type="text" name="name" required></p>
            <p>Description:</p>
            <p><textarea name="desc" required></textarea></p>
            <p>Price:</p>
            <p><input type="price" name="price"></p>
            <p><input type="submit" value="post" required min=0></p>
        </form>
    </div>
     
<!-- Update Service -->
<?php
    $sql = "SELECT id, name, description, price FROM tbl_services";
    $result = $con->query($sql);
    while($row = $result->fetch_object()){
        $id = $row->id;
        $name = $row->name;
        $desc = $row->description;
        $price = $row->price;

        echo '<p><h3>'.$name.'</h3></p>';
        echo '<p>'.nl2br($desc).'</p>';
        echo '<p>₱'.number_format($price,2).'</p>';
        echo '<div class="update-button" onclick="showModal(this)" value ="'.$id.'"">Update</div>';
    }
?>
<!-- Modal -->
<div id="modal">
    <div id="close" onclick="hide()">x</div>
    <div id="content"></div>
</div>

<script>
    function showModal(clicked){
        var id = clicked.getAttribute('value');
        var modal = document.getElementById('modal');
        modal.style.display = 'block';

        var myRequest = new XMLHttpRequest();
        var url = 'handlers/ajaxs/ajax_services.php';

        var formData = "update="+id;
        
        myRequest.open('POST', url ,true);
        myRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');

        myRequest.onload = function(){
            var response= this.responseText;
            document.getElementById('content').innerHTML = response;        
        }
        myRequest.send(formData);
    }
    function hide(){
        var modal = document.getElementById('modal');
        modal.style.display = 'none';
    }
</script>

<?php
    require_once('includes/sources/foot.php');
?>
</body>
</html>