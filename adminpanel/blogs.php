<?php



@session_start();
include "library/blogscontroller.php";
include "library/getstatic.php";
$gs=new getstatic();
$bc=new blogscontroller();
$categorylist=$bc->getcategorylist();

$gs->checksession();
$baseurl=$gs->home_base_url();

if(isset($_POST['addblog']))
{
    $bc->blogsadd();
}

if(isset($_POST['editblog']))
{
    $bc->blogsedit();
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

    <script type="text/javascript">



    function imagepreview()
    {
        var image=document.getElementById('coverimageurl').value;
        var imgprev=document.getElementById('imageprevlink');
        imgprev.src=image;
        alert(image);
        return;
    }
    </script>

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
            <h1 class="page-header">Add/Edit Blogs</h1>
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

                <?php if(isset($_REQUEST['data']))
                {
                    $blogdetail=$_SESSION['editblogsdetail'];
                    $blogeditsn=$blogdetail['sn'];
                    $title=$blogdetail['title'];
                    $metadata=$blogdetail['metadata'];
                    $keyword=$blogdetail['keyword'];
                    $description=$blogdetail['description'];
                    $status=$blogdetail['status'];
                    $coverimage=$blogdetail['coverimage'];
                    $category=$blogdetail['category'];
                    $coverimageurl=$blogdetail['coverimageurl'];
                ?>
                <form method="post" action="#" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="blogtitle">Blog Title</label>
                        <input type="text" class="form-control" id="blogtitle" name="blogtitle" value="<?php echo $title;?>">
                    </div>
                    <div class="form-group">
                        <label for="meta">Meta Data</label>
                        <input type="text" class="form-control" id="meta" name="meta" value="<?php echo $title;?>">
                        <p class="help-block">Meta Data Seperated By Comma ","</p>
                    </div>
                    <div class="form-group">
                        <label for="keywords">Keywords</label>
                        <input type="text" class="form-control" id="keywords" name="keywords" value="<?php echo $title;?>">
                        <p class="help-block">Keywords Seperated By Comma ","</p>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description">
                            <?php echo $description;?>
                        </textarea>
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
                            <?php foreach($categorylist as $category){?>
                            <option value="<?php echo $category['category']; ?>"><?php echo $category['category']; ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="coverimage">Cover Image For The Blog</label><br>
                        <input type="hidden" name="blogid" value="<?php echo $blogeditsn; ?>">
                        <img src="images/<?php echo $coverimage;?>" alt="your image" id="image" width="250px"
                             height="100px" style="display: none;"/>
                    </div>
                    <div class="form-group">
                        <label for="coverimage">Cover Image URL For The Blog(Cloudinary)</label>
                        <input class="form-control" type="text" id="coverimageurl"
                               name="coverimageurl"
                               value="<?php echo $coverimageurl; ?>"
                               placeholder="http://res.cloudinary.com/rashik/image/upload/v1433090106/me_vjt6kw.jpg">
                        <div id="imgurlprev"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="editblog">Edit Blog</button>
                </form>

                <?php } else {?>


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
                            <?php foreach($categorylist as $category){?>
                                <option value="<?php echo $category['category']; ?>"><?php echo $category['category']; ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="coverimage">Cover Image For The Blog</label>
                        <input class="" type="file" id="coverimage" name="coverimage">
                        <img src="#" alt="your image" id="imageprev" width="250px" height="100px" style="display:
                        none;"/>
                    </div>
                    <div class="form-group">
                        <label for="coverimage">Cover Image URL For The Blog(Cloudinary)</label>
                        <input class="form-control" type="text" id="coverimageurl"
                               name="coverimageurl"
                               placeholder="http://res.cloudinary.com/rashik/image/upload/v1433090106/me_vjt6kw.jpg">
                        <div id="imgurlprev"></div>
                    </div>
                    <button type="submit" class="btn btn-success" name="addblog">Add Blog</button>
                </form>

                <?php }?>

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

$(function() {
    $("#coverimageurl").keyup(function () {
        var imgurl = $("#coverimageurl").val();
        var imgsrc="<img src="+imgurl+" width=\"250px\"/>";
        $('#imgurlprev').html(imgsrc);
    });
});

</script>
</body>
</html>