<?php
    error_reporting(E_ERROR | E_PARSE);
    include"includes/get_browser.php";
    include"adminpanel/library/getstatic.php";
    $gs=new getstatic();
    $baseurl=$gs->home_base_url();

    include"adminpanel/dao/webconfig.php";
    include"adminpanel/dao/blogsdao.php";
    include"adminpanel/library/blogscontroller.php";

    $id=$_REQUEST['bid'];
    $bc=new blogscontroller();
    $blogsarray=$bc->getallblogsclient();
    $details=$bc->getblogdetails($id);
?>
<!--<a href="http://example.com/bar.html#disqus_thread">Link</a>-->
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $details['title']; ?> - Rashik Tuladhar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="language" content="en-US" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel="alternate" href="http://rashik.com.np/" hreflang="en" />
    <link rel="icon" href="<?php echo $baseurl; ?>images/logo.png">

    <meta name="description" content="<?php echo $details['metadata']; ?>">
    <meta name="keywords" content="<?php echo $details['keyword']; ?>">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Web Designers in Nepal | Web Developer In Nepal" />
    <meta property="og:description" content="Rashik, web designer from nepal and freelance webdesigner from nepal provides world class web design, grahpihc design, Search Engine Optimization , IT professional from nepal, freelance web designer nepal, freelance web designer, web developer, web page designer, web" />
    <meta property="og:url" content="http://www.rashik.com.np" />
    <meta property="article:published_time" content="<?php echo date("Y/m/d", strtotime($details['createddate'])); ?>" />
    <meta property="article:modified_time" content="<?php echo date("Y/m/d", strtotime($details['createddate'])); ?>"/>
    <meta property="og:site_name" content="Rashik Tuladhar | Web Developer/Designer In Nepal" />
    <meta name="twitter:card" content="summary" />

    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/customstyle.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/mainstyle.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Dancing+Script">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl;?>css/styles.css">
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=440080386153926";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top"><?php include"includes/navigationbar.php"; ?></nav>
<!-- Fixed navbar -->


<div class="container full-blogs">
    <div class="row">
        <div class="blog-lists">
            <div class="col-xs-12 col-md-8">


                <?php if($details['errorcode']==1) { ?>

                       <div class="blog-cover">
                           <button class="btn btn-success" onclick="window.history.back()">
                               Go Back To Previous Page
                           </button>
                           <img src="<?php echo $baseurl; ?>/images/errorpage.png"
                                height="200px"
                                class="img-responsive" style="padding-top: 10px;">
                       </div>

                <?php } else { ?>

                        <div class="blog-cover">
<!--                            <img src="--><?php //echo $baseurl; ?><!--adminpanel/images/--><?php //echo $details['coverimage']; ?><!--"-->
<!--                                 height="200px"-->
<!--                                 class="img-responsive">-->
                            <img src="<?php echo $details['coverimageurl']; ?>"
                                 height="200px"
                                 class="img-responsive">;
                        </div>

                        <div class="blog-title text-justify">
                            <?php echo $details['title']; ?>
                        </div>

                        <div class="blog-author">
                            <?php echo ucfirst($details['createdby']); ?>,
                            <?php echo date("Y/m/d", strtotime($details['createddate'])); ?>

                            <div class="sharepost">

                                <div class="fb-share-button" data-href="http://<?php
                                echo $_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];?>" data-layout="button_count"></div>


                                <a href="https://twitter.com/share"
                                   class="twitter-share-button"
                                    data-via="RashikTuladhar" data-dnt="true">Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                            </div>
                        </div>

                        <div class="blog-description text-justify">
                            <?php echo $details['description']; ?>
                        </div>

                        <div class="tags">
                            <span class="text-danger">Category:</span><br>
                            <a href="#" class="btn btn-primary">
                                <?php echo $details['category']; ?>
                            </a>
                        </div>

                        <?php include "includes/authordetails.php"; ?>

                        <div class="full-blog-comments">
                            <div id="disqus_thread"></div>
                            <script type="text/javascript">
                                /* * * CONFIGURATION VARIABLES * * */
                                var disqus_shortname = 'rashikblog';
                                /* * * DON'T EDIT BELOW THIS LINE * * */
                                (function () {
                                    var dsq = document.createElement('script');
                                    dsq.type = 'text/javascript';
                                    dsq.async = true;
                                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                })();
                            </script>
                            <noscript>
                                Please enable JavaScript to view the
                                <a href="https://disqus.com/?ref_noscript" rel="nofollow">
                                    comments powered by Disqus.
                                </a>
                            </noscript>
                        </div>

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


<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'rashikblog';

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>


</body>
</html>