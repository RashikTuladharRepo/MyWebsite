<?php
    @session_start();
    include "library/getstatic.php";
    include "library/blogscontroller.php";
    $gs=new getstatic();

    $bc=new blogscontroller();
    $blogsarray=$bc->getallblogs();

	$gs->checksession();
    $baseurl=$gs->home_base_url();

    if(isset($_REQUEST['did'])!="")
    {
        $bc->deleteblog($_REQUEST['did'],$_REQUEST['coverimage']);
    }

    if(isset($_REQUEST['cs'])!="")
    {
        $bc->changestatus($_REQUEST['cs']);
    }

    if(isset($_REQUEST['eid'])!="")
    {
        $bc->editblog($_REQUEST['eid']);
    }
?>
<html>
    <head>
        <title>Rashik's Blog Dashboard Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo $baseurl; ?>images/logo.png">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>adminpanel/css/admincustomstyle.css">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Dancing+Script">

    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
            <?php include "includes/adminnavigation.php"; ?>
            </div>
        </nav>

        <div class="clearfix"></div>

        <div class="container-fluid dashboard-container">
            <div class="row">
                <?php include "includes/adminsidebar.php"; ?>

                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Blogs Management</h1>
                    <div class="has-error">
                    <span id="helpBlock" class="help-block">
                        <?php
                        @session_start();
                        if(isset($_SESSION['msg'])!="")
                        {
                            echo $_SESSION['msg'];
                            $_SESSION['msg'] = null;
                            unset($_SESSION['msg']);
                        }
                        ?>
                    </span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead><tr><th>Id</th><th>Title</th><th>Status</th><th>Remarks</th></tr></thead>
                            <tbody>
                                <?php foreach ($blogsarray as $row) { ?>
                                    <tr>
                                        <th scope = "row" ><?php echo $row['sn']; ?></th >
                                        <td style="min-width: 60%;"><?php echo $row['title']; ?></td >
                                        <td class="text-center" >
                                            <?php if($row['status']=="active") { ?>
                                                <i class="fa fa-check text-success" ></i >
                                            <?php } else  { ?>
                                                <i class="fa fa-close text-danger"></i>
                                            <?php } ?>
                                        </td >
                                        <td >
                                            <a href = "<?php echo $baseurl; ?>adminpanel/dashboard.php?eid=<?php echo $row['sn'];?>" class="btn btn-success" >
                                                <i class="fa fa-pencil" >&nbsp;Edit </i >
                                            </a >
                                            <a href = "<?php echo $baseurl; ?>adminpanel/dashboard.php?did=<?php echo
                                            $row['sn'];?>&coverimage=<?php echo $row['coverimage']; ?>"
                                            class="btn btn-danger" onclick="return confirm('Are You Sure to Delete ' +
                                             'The Blog?')" >
                                                <i class="fa fa-eraser" >&nbsp;Delete </i >
                                            </a >
                                            <a href = "<?php echo $baseurl; ?>adminpanel/dashboard.php?cs=<?php
                                            echo
                                            $row['sn'];?>" class="btn btn-warning" >
                                                <i class="fa fa-recycle" >&nbsp;Change Status </i >
                                            </a >
                                        </td >
                                    </tr >
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="container-fluid pull-right">
                        <ul class="pagination">
                            <li class="disabled"><a href="#">&laquo;</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>

                    <div class="clearfix"></div>

                </div>

            </div>
        </div>


        <footer>
            <?php include"includes/footer.php"; ?>
        </footer>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="<?php echo $baseurl; ?>js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready( function() {
                $('#helpBlock').delay(1000).fadeOut();
            });
        </script>
    </body>
</html>