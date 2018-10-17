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
            <div class="news-content">
                <h1>News</h1>
<?php
    $sql = "SELECT title, content, datecreated FROM tbl_news ORDER BY news_id DESC LIMIT 10";
    $result = $con->query($sql);
    while($fetch = $result->fetch_object()){
        $title = $fetch->title;
        $content = $fetch->content;
        $datecreated = $fetch->datecreated;
        $datecreated = date('F j, Y h:i:s',strtotime($datecreated));

        echo '<h3>'.$title.'</h3>';
        echo '<p>'.$datecreated.'</p>';
        echo '<p>'.nl2br($content).'</p>';
    }
?>
            </div>
        </div>
    </div>
<?php
    require_once('includes/sources/foot.php');
?>
</body>
</html>