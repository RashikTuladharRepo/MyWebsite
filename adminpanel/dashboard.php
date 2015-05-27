<?php
    @session_start();
    include "library/getstatic.php";
    include "library/blogscontroller.php";
    $gs=new getstatic();
    $gs->checksession();
    $baseurl=$gs->home_base_url();

    $bc=new blogscontroller();
    //for pagination
    $blogcount=$bc->getblogscount();
    $totalpage=ceil($blogcount['totalrows']/10);
    if(!isset($_REQUEST['page']))
    {
        $_REQUEST['page']=1;
    }

    if($_REQUEST['page']=="" || $_REQUEST['page']==1 || $_REQUEST['page']<0)
    {
        $N=0;
    }
    elseif($_REQUEST['page']>$totalpage)
    {
        $N=5*$totalpage;
    }
    else
    {
        $N=5*$_REQUEST['page'];
    }



    $blogsarray=$bc->getallblogs($N);




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
                    <div class="help-block">
                        <?php
                            echo "Total Number of Blogs: ". $blogcount['totalrows']."<br>";
                        ?>

                        <strong class="text-primary">
                            <?php
                            if($_REQUEST['page']<0)
                            {
                                $currentpage="1";
                            }
                            else
                            {
                                $currentpage=$_REQUEST['page'];
                            }

                            echo "You Are In Page Number: ". $currentpage ." of ". $totalpage ;
                            ?>
                        </strong>

                    </div>

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
                            <thead><tr><th>Id</th><th>Title</th><th>Category</th><th>Status</th><th>Remarks</th>
                            </tr></thead>
                            <tbody>
                                <?php foreach ($blogsarray as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['sn']; ?></td>
                                        <td style="min-width: 60%;"><?php echo $row['title']; ?></td >
                                        <td><?php echo $row['category']; ?></td >
                                        <td class="text-center" >
                                            <?php if($row['status']=="active") { ?>
                                                <i class="fa fa-check text-success" ></i >
                                            <?php } else  { ?>
                                                <i class="fa fa-close text-danger"></i>
                                            <?php } ?>
                                        </td >
                                        <td>
                                            <a href = "<?php echo $baseurl; ?>adminpanel/dashboard.php?eid=<?php echo $row['sn'];?>" class="btn btn-success" >
                                                <i class="fa fa-pencil" >&nbsp;</i >
                                            </a >
                                            <a href = "<?php echo $baseurl; ?>adminpanel/dashboard.php?did=<?php echo
                                            $row['sn'];?>&coverimage=<?php echo $row['coverimage']; ?>"
                                            class="btn btn-danger" onclick="return confirm('Are You Sure to Delete ' +
                                             'The Blog?')" >
                                                <i class="fa fa-eraser" >&nbsp;</i >
                                            </a >
                                            <a href = "<?php echo $baseurl; ?>adminpanel/dashboard.php?cs=<?php
                                            echo
                                            $row['sn'];?>" class="btn btn-warning" >
                                                <i class="fa fa-recycle" >&nbsp;</i >
                                            </a >
                                        </td >
                                    </tr >
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="container-fluid pull-right">
                        <ul class="pagination">

                                <?php
                                    if($_REQUEST['page']<0 || $_REQUEST['page']==1)
                                    {
                                ?>
                                    <li class="disabled"><a href="#">&laquo;</a></li>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                    <li><a href="dashboard.php?page=<?php echo $_REQUEST['page']-1; ?>">&laquo;</a></li>
                                <?php
                                    }
                                ?>

                            <?php
                            if($totalpage>5)
                            {
                                $pages=5;
                            }
                            else
                            {
                                $pages=$totalpage;
                            }
                            for($i=1;$i<=$pages;$i++)
                            {
                            ?>
                                <li>
                                    <a href="dashboard.php?page=<?php echo $i; ?>">
                                        <?php echo $i;?>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>

                                <?php
                                if($_REQUEST['page']>=$totalpage)
                                {
                                    ?>
                                    <li class="disabled"><a href="#">&raquo;</a></li>
                                <?php
                                }
                                else
                                {
                                    ?>
                                    <li><a href="dashboard.php?page=<?php echo $_REQUEST['page']+1; ?>">&raquo;</a></li>
                                <?php
                                }
                                ?>

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