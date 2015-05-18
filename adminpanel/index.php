<?php
@session_start();
include "dao/logincheck.php";
include"library/getstatic.php";
$gs=new getstatic();
$baseurl=$gs->home_base_url();
if(isset($_POST['signin']))
{
    $lc=new logincheck();
    $lc->login();
}
?>
<html>
    <head>
        <title>Rashik's Blog Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo $baseurl; ?>images/logo.png">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>adminpanel/css/admincustomstyle.css">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Dancing+Script">
    </head>
    <body>

    <div class="container">

        <div class="signin-form">
            <form method="post" action="#">
                <h2>Administrator Login</h2>
                <div class="has-error">
                    <span id="helpBlock" class="help-block">
                        <?php
                        if(isset($_SESSION['message']))
                        {
                            echo $_SESSION['message'];
                        }
                        ?>
                    </span>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Password">
                    </div>
                    <br>
                    <button class="btn btn-md btn-primary btn-block" type="submit" name="signin">Sign in</button>

                </div>
            </form>
        </div>

    </div>
    <footer>
        <?php include"includes/footer.php"; ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?php echo $baseurl; ?>js/bootstrap.min.js"></script>
    <script>
    $(document).ready( function() {
    $('#helpBlock').delay(2000).fadeOut();
    });
    </script>
    </body>
</html>