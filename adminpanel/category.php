<?php
@session_start();
include "library/blogscontroller.php";
include "library/getstatic.php";
$gs=new getstatic();
$bc=new blogscontroller();


$gs->checksession();
$baseurl=$gs->home_base_url();

$categorylist=$bc->getcategorylist();

if(isset($_POST['addcategory']))
{
    $bc->addcategory();
}
if(isset($_REQUEST['did']))
{
    $bc->deletecategory($_REQUEST['did']);
}

?>
<html>
<head>
    <title>Rashik's Blog Blog Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo $baseurl; ?>images/logo.png">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>adminpanel/css/admincustomstyle.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Dancing+Script">
    <!--Froala Editor-->
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>adminpanel/css/froala_editor.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>adminpanel/css/froala_style.min.css">
    <!--Froala Editor-->

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
            <h1 class="page-header">Add/Delete Category</h1>
            <div class="has-error">
                    <span id="helpBlock" class="help-block">
                        <?php
                        if(isset($_SESSION['msg']))
                        {
                            echo $_SESSION['msg'];
                            $_SESSION['msg'] = null;
                            unset($_SESSION['msg']);
                        }
                        ?>
                    </span>
            </div>
            <div class="categoryforms">
                    <form method="post" action="#" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category"
                                   placeholder="Category">
                        </div>
                        <button type="submit" class="btn btn-success" name="addcategory">Add Category</button>
                    </form>
            </div>

            <?php if(count($categorylist)>0) {?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead><tr><th>Id</th><th>Category</th><th>Remarks</th></tr></thead>
                    <tbody>
                        <?php
                            foreach($categorylist as $rows)
                            {
                                ?>
                                <tr>
                                    <td><?php echo $rows['sn']; ?></td>
                                    <td><?php echo $rows['category']; ?></td>
                                    <td>
                                        <a href="<?php $_SERVER['PHP_SELF'] ?>?did=<?php echo $rows['sn']; ?>"
                                           class="btn btn-danger"
                                           onclick="return confirm('Are You Sure To Delete The Category?');">
                                            <i class="fa fa-eraser"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>

        </div>
    </div>
</div>


<footer>
    <?php include"includes/footer.php"; ?>
</footer>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo $baseurl; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $baseurl; ?>adminpanel/js/froala_editor.min.js" type="text/javascript"></script>

<script type="text/javascript">

    //froalaeditor customization
    $(function(){
        $('textarea#description').editable({
            buttons: ['sep', 'bold', 'italic', 'underline','strikeThrough','fontFamily','fontSize','formatBlock','align','blockStyle','insertOrderedList','insertUnorderedList','indent','html','insertImage'],
            inlineMode: false,
            minHeight: 100,
            maxWidth:100,
            imageUploadURL: 'http://localhost/MyWebsite/adminpanel/upload_image.php'
        })
    });

    //for displaying the seession message and fadeout
    $(document).ready( function() {
        $('#helpBlock').delay(2000).fadeOut();
    });

</script>
</body>
</html>