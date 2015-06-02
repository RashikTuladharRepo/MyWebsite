<?php
error_reporting(E_ERROR | E_PARSE);
include"includes/get_browser.php";
include"adminpanel/library/getstatic.php";
$gs=new getstatic();
$baseurl=$gs->home_base_url();

include"adminpanel/dao/webconfig.php";
include"adminpanel/dao/blogsdao.php";
include"adminpanel/library/blogscontroller.php";

//$id=$_REQUEST['bid'];
$bc=new blogscontroller();
$blogsarray=$bc->getallblogsclient();

include"includes/paginate.php";
?>
    <!--<a href="http://example.com/bar.html#disqus_thread">Link</a>-->
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


    <div class="container full-blogs">
        <div class="row">
            <div class="blog-lists">
                <div class="col-xs-12 col-md-8">
                    <h2 class="text-center category-heading">
                        <?php echo ucwords($_REQUEST['category'])."";?> Categorized Blogs
                    </h2>

                    <?php if($rows>0){?>

                    <div class="help-block">
                        <?php
                        echo "Total Number of Blogs: ". $blogcount['totalrows']."<br>";
                        ?>

                        <strong class="text-primary">
                            <?php
                            if($_REQUEST['pn']<0 || $_REQUEST['pn']=="")
                            {
                                $currentpage="1";
                            }
                            else
                            {
                                $currentpage=$_REQUEST['pn'];
                            }

                            echo "You Are In Page Number: ". $currentpage ." of ". $rows ;
                            ?>
                        </strong>

                    </div>

                    <?php foreach ($blogsarraycategory as $categoryrow) { ?>
                        <div class="col-md-6 blogslists">
                            <a href="#">
                                <div class="blogstitle">
                                    <div class="blogimage col-md-12">
<!--                                        <img src="--><?php //echo $baseurl; ?><!--adminpanel/images/--><?php
//                                        echo $categoryrow['coverimage']; ?><!--" class="img-responsive">-->
                                        <img src="<?php echo $categoryrow['coverimageurl']; ?>" class="coverimage
                                        img-responsive">
                                    </div>
                                    <div class="col-md-12 blogdetails">
                                        <h4 class="text-center"><?php echo $categoryrow['title']; ?></h4>
                                        <a href="<?php echo $baseurl; ?>fullblog/<?php echo $categoryrow['sn']; ?>/<?php echo $categoryrow['title']; ?>" class="btn btn-success">
                                            Read Now &raquo;
                                        </a>
                                    </div>
                                </div>
                             </a>
                        </div>
                    <?php } ?>

                    <div class="clearfix"></div>
                    <div class="container-fluid pull-right">
                        <ul class="pagination">

                            <?php echo $paginationCtrls; ?>

                        </ul>
                    </div>

                    <?php } else {?>
                        <button class="btn btn-success" onclick="window.history.back()">
                            Go Back To Previous Page
                        </button>
                        <img src="<?php echo $baseurl; ?>/images/noblog.png"
                             height="200px"
                             class="img-responsive" style="padding-top: 10px;">
                    <?php } ?>


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


<!--    <script type="text/javascript">-->
<!--        /* * * CONFIGURATION VARIABLES * * */-->
<!--        var disqus_shortname = 'rashikblog';-->
<!---->
<!--        /* * * DON'T EDIT BELOW THIS LINE * * */-->
<!--        (function () {-->
<!--            var s = document.createElement('script'); s.async = true;-->
<!--            s.type = 'text/javascript';-->
<!--            s.src = '//' + disqus_shortname + '.disqus.com/count.js';-->
<!--            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);-->
<!--        }());-->
<!--    </script>-->


    </body>
    </html>


