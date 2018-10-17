<?php
    require_once('includes/sources/head.php');
?>

<style>
    #profile{
        width: 150px;
        padding: 10px;
    }
    
    .widget > div{
        display: inline-block;
    }
    
    .guitar-combine-img{
        display: inline-block;
        width:30%;
        transform: scale(0.65);
    }
    
    .rotate{
        transform: rotate(-90deg);
        width: 150px;
        margin:20px 9px;
    }
    
    .well{
        padding: 10px;
    }
    
    .hidden{
        display: none;
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
<!--
    <div id="banner">
        <div class="container">
            <div id="header">
                <h1>Your Customed Guitars</h1>
            </div>
            
        </div>
    </div>  
-->
    <div style="margin-bottom:70px;"></div>
    <?php
        $sql = "SELECT * ,concat(fname , ' ' , lname) as fullname FROM tbl_accs where id = '{$_SESSION['user_id']}'";
        $query  = $con->query($sql);
        $result = mysqli_fetch_assoc($query);
    ?>
    <div class="container">
        <div class="row">
            <aside class="col-md-3" style="border:1px solid #000;">
                <img src="../images/<?php echo $result['profile_pic']?>" id="profile"> 
                <ul class="list-unstyled">
                    <li class="text-capitalize"><small>Fullname : </small><strong><?php echo $result['fullname']?></strong></li>
                    <li><small>Username : </small> <strong><?php echo $result['username']?></strong></li>
                    <li><small>Email : </small> <strong><?php echo $result['email']?></strong></li>
                    <li><small>Contact : </small> <strong><?php echo $result['contact']?></strong></li>
                </ul>
                <a href="#">Edit</a>
            </aside>
            
            <section class="col-md-8" style="border:1px solid #000;">
                <?php
                    if(!isset($_GET['view']) && !isset($_GET['id'])) {
                        require_once('includes/pages/profile_main.php');
                    }
                     
                    else{
                        
                        $view = strtolower($_GET['view']);
                        #profile_guitar_view.php
                        switch($view) {
                            case 'guitar':
                                require_once('includes/component/profile_guitar_view.php');
                            break;
                        }
                    }
                ?>
            </section>
        </div>
    </div>
<?php
    require_once('includes/sources/foot.php');
?>
    <script>
        $(document).ready(function(){
            
        });
        function toggle($toggle){
            if($toggle =='containercash'){
                $("#containercash").show();
                $("#containerinstallment").hide();
            }
            else if($toggle ='containerinstallment'){
                 $("#containerinstallment").show();
                $("#containercash").hide();
            }
        }
    </script>
</body>
</html>