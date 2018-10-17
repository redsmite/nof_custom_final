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
    <div id="banner">
        <div class="container">
            <div id="header">
                <h1>Welcome to NOF Guitar Cuztomization</h1>
                <p>
                    <button class="btn btn-warning btn-md">
                        <label class="text-white">Cuztomize</label>
                    </button>
                    <button class="btn btn-warning btn-md"><label class="text-white">View Ideas</label></button>
                </p>
            </div>
            
        </div>
    </div>  
     
<!-- Modal -->
    <?php
        require_once('includes/component/modal/modal_login.php');
        require_once('includes/component/modal/modal_register.php');
    ?>
    <div style="margin-bottom:70px;"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                    include_once('includes/component/index_register.php');
                ?>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once('includes/sources/foot.php');
?>
</body>
</html>