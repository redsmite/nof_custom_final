<?php
    require_once('includes/sources/head.php');
?>
    <style>
        .widget{
            width: 150px;
            
            margin: 15px;
            
            text-align: center;
            
            text-decoration: none;
            color: #000;
            
            background: #eee;
        }
        .widget img{
            transform: rotate(-90deg);
/*            height: 100px;*/
            width: 100px;
        }
    </style>
</head>

<body>
    <?php
        require_once('includes/views/navigation.php');
    ?>

    <div class="container">
    <!--MARGINS-->
    <div style="margin-bottom:80px;"></div>
    <!--MARGINS-->   
    <div class="row">
        
        <?php
            include_once('includes/component/component_create.php');
        ?>
        
        <!-- parts Lists -->
        <div class="col-lg-9">
            <?php
                if(!isset($_GET['id'])) :
                    ?>
                        <div class="accordion" id="accordionExample">
                            <?php
                                include_once('includes/component/component_head_wood.php');
                            ?>
                            <?php
                                include_once('includes/component/component_neck_wood.php');
                            ?>
                            <?php
                                include_once('includes/component/component_body_wood.php');
                            ?>
                        </div>
                    <?php
                else:
                $id = $_GET['id'];
                include_once('includes/component/component_update.php');
                endif;
            ?>
        </div>
        <!-- parts Lists -->
    </div>
 
        <?php
                    require_once('includes/component/component_body_wood.php');
                ?>
<?php
    require_once('includes/sources/foot.php');
?>
</body>
</html>