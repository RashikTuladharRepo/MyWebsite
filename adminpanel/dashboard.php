<?php
error_reporting(E_ERROR | E_PARSE);
@session_start();
include "library/getstatic.php";
include "library/blogscontroller.php";
$gs=new getstatic();
$gs->checksession();
$baseurl=$gs->home_base_url();

$bc=new blogscontroller();






//for pagination
$blogcount=$bc->getadminblogscount();
$rows=$blogcount['totalrows'];

// This is the number of results we want displayed per page
$page_rows = 10;
if($rows<11)
{
    $page_rows=$rows;
}
// This tells us the page number of our last page
$last = ceil($rows/$page_rows);
// This makes sure $last cannot be less than 1
if($last < 1)
{
    $last = 1;
}
// Establish the $pagenum variable
$pagenum = 1;
// Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['pn']))
{
    $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1)
{
    $pagenum = 1;
}
else if ($pagenum > $last)
{
    $pagenum = $last;
}
// This sets the range of rows to query for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
// This is your query again, it is for grabbing just one page worth of rows by applying $limit

$blogdata=$bc->getallblogswithpage($limit);

$paginationCtrls = '';
// If there is more than 1 page worth of results
if($last != 1)
{
    /* First we check if we are on page one. If we are then we don't need a link to the previous page or the first page so we do nothing. If we aren't then we generate links to the first page, and to the previous page. */
    if ($pagenum > 1)
    {
        $previous = $pagenum - 1; $paginationCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous
        .'">Previous</a></li> &nbsp; &nbsp; ';
        // Render clickable number links that should appear on the left of the target page number
        for($i = $pagenum-4; $i < $pagenum; $i++)
        {
            if($i > 0)
            {
                $paginationCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a></li> &nbsp; ';
            }
        }
    }
    // Render the target page number, but without it being a link
    $paginationCtrls .= '<li class="active"><a>'.$pagenum.'</a></li> &nbsp; ';
    $currentpage=$pagenum;
    $totalpage=$last;
    // Render clickable number links that should appear on the right of the target page number
    for($i = $pagenum+1; $i <= $last; $i++)
    {
        $paginationCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a></li> &nbsp; ';
        if($i >= $pagenum+4)
        {
            break;
        }
    }
    // This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last)
    {
        $next = $pagenum + 1; $paginationCtrls .= ' &nbsp; &nbsp; <li><a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a></li> ';
    }
}








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
    <div class="black_overlay" id="black_overlay"></div>
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
                    <?php foreach ($blogdata as $row) { ?>
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
                                <a href = "<?php echo $baseurl; ?>adminpanel/dashboard.php?eid=<?php echo $row['sn'];?>" class="btn btn-success" id="edit">
                                    <i class="fa fa-pencil" >&nbsp;</i >
                                </a >
                                <a href = "<?php echo $baseurl; ?>adminpanel/dashboard.php?did=<?php echo
                                $row['sn'];?>&coverimage=<?php echo $row['coverimage']; ?>"
                                   class="btn btn-danger" onclick="return confirm('Are You Sure to Delete ' +
                                             'The Blog?')" id="delete">
                                    <i class="fa fa-eraser" >&nbsp;</i >
                                </a >
                                <a href ="<?php echo $baseurl; ?>adminpanel/dashboard.php?cs=<?php
                                echo $row['sn'];?>" class="btn btn-warning changestat" >
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
                    <?php echo $paginationCtrls; ?>
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
        $("#black_overlay").css("display","none");
        $("#delete").click(function(){
            $("#black_overlay").css("display","block");
        });
		$("#edit").click(function(){
            $("#black_overlay").css("display","block");
        });
    });
</script>
</body>
</html>