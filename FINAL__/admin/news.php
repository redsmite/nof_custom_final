<?php
    require_once('includes/sources/head.php');
?>
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
        <form action="handlers/forms/post_news.php" method="post">
            <h1>Post News</h1>
            <p>Title:</p>
            <p><input type="text" name="title" required></p>
            <p>Content:</p>
            <p><textarea name="content" required></textarea></p>
            <p><input type="submit" value="Post"></p>
        </form>
    </div>
        
<?php
    require_once('includes/sources/foot.php');
?>
</body>
</html>