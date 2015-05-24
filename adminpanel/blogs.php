<?php
@session_start();
include "library/blogscontroller.php";
include "library/getstatic.php";
$gs=new getstatic();
$bc=new blogscontroller();


$gs->checksession();
$baseurl=$gs->home_base_url();

if(isset($_POST['addblog']))
{
    $bc->blogsadd();
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
            <h1 class="page-header">Add Blogs</h1>
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
            <div class="blogforms">
                <form method="post" action="#" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="blogtitle">Blog Title</label>
                        <input type="text" class="form-control" id="blogtitle" name="blogtitle" placeholder="Enter Blog Title">
                    </div>
                    <div class="form-group">
                        <label for="meta">Meta Data</label>
                        <input type="text" class="form-control" id="meta" name="meta" placeholder="Meta Data">
                        <p class="help-block">Meta Data Seperated By Comma ","</p>
                    </div>
                    <div class="form-group">
                        <label for="keywords">Keywords</label>
                        <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Keywords">
                        <p class="help-block">Keywords Seperated By Comma ","</p>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="PHP" selected>PHP</option>
                            <option value="SQL">SQL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="coverimage">Cover Image For The Blog</label>
                        <input class="" type="file" id="coverimage" name="coverimage">
                        <img src="#" alt="your image" id="imageprev" width="250px" height="100px" style="display:
                        none;"/>
                    </div>
                    <button type="submit" class="btn btn-success" name="addblog">Add Blog</button>
                </form>
            </div>

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

//for image preview in the form
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageprev').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#coverimage").change(function(){
        readURL(this);
        document.getElementById('imageprev').style.cssText="display:block;padding-top:10px;";
//        document.getElementById("searchScroll").style.cssText = "position:fixed;margin:-50px;";
//        document.getElementById("searchScroll").style.cssText += "position:fixed;margin:-50px;";
    });

</script>
</body>
</html>