<?php
    error_reporting(E_ERROR | E_PARSE);
    //include"includes/get_browser.php";
    include"adminpanel/library/getstatic.php";

    $gs=new getstatic();
    $baseurl=$gs->home_base_url();

    include"adminpanel/dao/webconfig.php";
    include"adminpanel/dao/blogsdao.php";

    include"adminpanel/library/blogscontroller.php";

    $bc=new blogscontroller();

    include "includes/paginateall.php";



    $blogsarray=$bc->getallblogsclient();





?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Rashik's Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $baseurl; ?>images/logo.png">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/customstyle.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/mainstyle.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl;?>css/styles.css">
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

<!--<div class="container-fluid" style="margin-top:90px; height: auto; ">-->
<!--    <div id="owl-demo" class="owl-carousel owl-theme">-->
<!---->
<!--        --><?php
//        $handle = opendir(dirname(realpath(__FILE__)).'/images/carousel/');
//        while($file = readdir($handle)){
//            if($file !== '.' && $file !== '..'){
//                echo '<div class="item"><img class="img-rounded" src="images/carousel/'.$file.'" width="255px"
//                height="150px"></div>';
//            }
//        }
//        ?>
<!---->
<!---->
<!--<!--        <div class="item"><img class="img-rounded" src="images/banner1.jpg" width="255px" height="150px"></div>-->
<!--<!--        <div class="item"><img class="img-rounded" src="images/banner1.jpg" width="255px" height="150px"></div>-->
<!--<!--        <div class="item"><img class="img-rounded" src="images/banner1.jpg" width="255px" height="150px"></div>-->
<!--<!--        <div class="item"><img class="img-rounded" src="images/banner1.jpg" width="255px" height="150px"></div>-->
<!--<!--        <div class="item"><img class="img-rounded" src="images/banner1.jpg" width="255px" height="150px"></div>-->
<!--<!--        <div class="item"><img class="img-rounded" src="images/banner1.jpg" width="255px" height="150px"></div>-->
<!--<!--        <div class="item"><img class="img-rounded" src="images/banner1.jpg" width="255px" height="150px"></div>-->
<!--    </div>-->
<!---->
<!--</div>-->


<div class="container blogs">
    <div class="row">


        <div class="blog-lists">
            <div class="col-xs-12 col-md-8">
                <h2 class="text-center h2-heading">Latest Blog Posts</h2>
                <?php foreach($blogdata as $row) {?>
                <div class="blog">
                    <div class="row">
                        <div class="col-md-6 col-md-push-6">
<!--                            <img src="--><?php //echo $baseurl; ?><!--adminpanel/images/--><?php //echo $row['coverimage']; ?><!--"-->
<!--                                 class="coverimage img-responsive">-->
                            <img src="<?php echo $row['coverimageurl']; ?>"
                                 class="coverimage img-responsive">
                        </div>
                        <div class="col-md-6 col-md-pull-6">
                            <h2 class="text-justify"><?php echo $row['title']; ?></h2>
                                    <span class="author">
                                        <?php echo ucfirst($row['createdby']);?>, On <?php echo date("Y/m/d", strtotime($row['createddate']));?>
                                    </span>
                            <p class="text-justify">
                                <?php
                                    echo substr($row['description'],0,230).".....";
                                ?>
                            </p>
                            <a href="<?php echo $baseurl; ?>fullblog/<?php echo $row['sn']; ?>/<?php echo
                            $row['title']; ?>" class="btn btn-success">Read More&raquo;</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php } ?>
                <div class="clearfix"></div>
                <div class="container-fluid pull-right">
                    <ul class="pagination">

                        <?php echo $paginationCtrls; ?>

                    </ul>
                </div>
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
<script src="js/owl.carousel.min.js"></script>

<script>
    $(document).ready(function() {

        $("#owl-demo").owlCarousel({
            navigation : false,
            loop: true,
            autoPlay : 3000
        });
    });

    $(window).on('scroll', function() {
        var y_scroll_pos = window.pageYOffset;
        var scroll_pos_test = 150;             // set to whatever you want it to be

        if(y_scroll_pos > scroll_pos_test) {
            $('.navbar').fadeOut();
        }
        else
        {
            $('.navbar').fadeIn();
        }
    });
</script>


</body>
</html>