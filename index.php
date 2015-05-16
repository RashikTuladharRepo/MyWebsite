<?php
    error_reporting(E_ERROR | E_PARSE);
    include"includes/get_browser.php";
    include"adminpanel/library/getstatic.php";
    $gs=new getstatic();
    $baseurl=$gs->home_base_url();



    include"adminpanel/dao/webconfig.php";
    include"adminpanel/dao/blogsdao.php";

    include"adminpanel/library/blogscontroller.php";
    $bc=new blogscontroller();
    $blogsarray=$bc->getallblogs();



?>
<html>
<head>
    <title>Rashik's Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $baseurl; ?>images/logo.png">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/customstyle.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/mainstyle.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Dancing+Script">
<!--    <script>-->
<!--        function tick2()-->
<!--        {-->
<!--            $('#ticker_02 li:first').slideUp( function () { $(this).appendTo($('#ticker_02')).slideDown(); });-->
<!--        }-->
<!--        setInterval(function(){ tick2 () }, 3000);-->
<!--    </script>-->

</head>
<body id="home">
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=440080386153926";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top"><?php include"includes/navigationbar.php"; ?></nav>
<!-- Fixed navbar -->


<!--banner-->
<div class="home-banner">
    <div class="container-fluid">
        <div class="internal-holder"></div>
    </div>
</div>
<!--banner ends-->



<div class="container blogs">
    <div class="row">


        <div class="blog-lists">
            <div class="col-xs-12 col-md-8">
                <h2 class="text-center h2-heading">Latest Blog Posts</h2>

                <?php foreach($blogsarray as $row) {?>
                <div class="blog">
                    <div class="row">
                        <div class="col-md-6 col-md-push-6">
                            <img src="adminpanel/images/<?php echo $row['coverimage']; ?>"
                                 class="coverimage img-responsive">
                        </div>
                        <div class="col-md-6 col-md-pull-6">
                            <h2 class="text-justify"><?php echo $row['title']; ?></h2>
                                    <span class="author">
                                        <?php echo ucfirst($row['createdby']);?>, On <?php echo $row['createddate'];?>
                                    </span>
                            <p class="text-justify">
                                <?php
                                    echo substr($row['description'],0,230).".....";
                                ?>
                            </p>
                            <a href="fullblog.php?bid=<?php echo $row['sn']; ?>" class="btn btn-success">Read More
                                &raquo;</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php } ?>





<!--                --><?php //for($i=0;$i<5;$i++) {?>
<!--                    <div class="blog">-->
<!--                        <div class="row">-->
<!--                            <div class="col-md-6 col-md-push-6"><img src="images/banner.jpg" class="img-responsive"></div>-->
<!--                            <div class="col-md-6 col-md-pull-6">-->
<!--                                <h2 class="text-center">First Blog Templates</h2>-->
<!--                                    <span class="author">-->
<!--                                        Rashik Tuladhar, On --><?php //echo date('Y-m-d');?>
<!--                                    </span>-->
<!--                                <p class="text-justify">It is a long established fact that a reader will be distracted by the-->
<!--                                    readable-->
<!--                                    content of a page-->
<!--                                    when-->
<!--                                    looking at its layout. The point of using Lorem Ipsum is that it has a-->
<!--                                    more-or-less normal distribution of letters,-->
<!--                                    as opposed to using 'Content here, content here'.-->
<!--                                </p>-->
<!--                                <a href="fullblog.php" class="btn btn-success">Read More &raquo;</a>-->
<!--                            </div>-->
<!--                            <div class="clearfix"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <br>-->
<!--                --><?php //} ?>
            </div>
        </div>

        <div class="col-xs-12 col-md-4">
            <?php include "includes/right-menu.php"; ?>
        </div>

    </div>
</div>



<footer>
    <?php include"includes/footer.php"; ?>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo $baseurl; ?>js/jquery.smoothscroll.js"></script>
<script src="<?php echo $baseurl; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $baseurl; ?>js/clock.js"></script>
<script type="text/javascript">
    $(function () {
        $('#js-news').ticker();
    });
</script>


</body>
</html>