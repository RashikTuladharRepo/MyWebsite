<?php
    include"includes/get_browser.php";
    include"adminpanel/library/getstatic.php";
    $gs=new getstatic();
    $baseurl=$gs->home_base_url();
?>
<!--<a href="http://example.com/bar.html#disqus_thread">Link</a>-->

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

                <div class="blog-cover">
                    <img src="images/banner1.jpg" height="200px" class="img-responsive">
                </div>
                <div class="blog-title text-justify">
                    Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit
                </div>
                <div class="blog-author">
                    By Rashik Tuladhar, <?php echo date('Y-m-d'); ?>
                </div>
                <div class="blog-description text-justify">
                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
                    Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form,
                    accompanied by English versions from the 1914 translation by H. Rackham.
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
                    by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem
                    Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on
                    the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.
                    It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem
                    Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or
                    non-characteristic words etc.
                    <br><br>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                    make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of
                    Letraset sheets containing Lorem Ipsum passages,
                    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <div class="tags">
                    <span class="text-danger">Keywords:</span><br>
                    <a href="#" class="btn btn-primary">C/C++</a>
                    <a href="#" class="btn btn-primary">C/C++</a>
                    <a href="#" class="btn btn-primary">C/C++</a>
                    <a href="#" class="btn btn-primary">C/C++</a>
                    <a href="#" class="btn btn-primary">C/C++</a>
                    <a href="#" class="btn btn-primary">C/C++</a>
                    <a href="#" class="btn btn-primary">C/C++</a>
                    <a href="#" class="btn btn-primary">C/C++</a>
                    <a href="#" class="btn btn-primary">C/C++</a>
                </div>


                <div class="blog-about-me col-md-12">
                    <img width="80" height="80" src="<?php echo $baseurl; ?>images/user.png" class="img-responsive pull-left img-circle bg-primary">
                        <h4>&nbsp;&nbsp;Rashik Tuladhar</h4><hr>
                        <p class="text-justify">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <br><hr>
                </div>


                <div class="full-blog-comments">
                    <div id="disqus_thread"></div>
                    <script type="text/javascript">
                        /* * * CONFIGURATION VARIABLES * * */
                        var disqus_shortname = 'rashikblog';

                        /* * * DON'T EDIT BELOW THIS LINE * * */
                        (function() {
                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
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