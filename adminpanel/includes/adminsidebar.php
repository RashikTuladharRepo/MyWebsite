<?php
$uri= $_SERVER['REQUEST_URI'];
$array=explode("/",$uri);
$count=count($array);
$page=trim(strtolower($array[$count-1]));
//echo $page=trim($page);
?>

<div class="dashboard-sidebar col-sm-3 col-md-2 sidebar" id="sidebar" role="navigation">
    <ul class="nav nav-sidebar">
        <li class="<?php echo ($page=="dashboard.php"||$page=="")?"active" :""; ?>"><a href="dashboard.php"><i class="fa
        fa-sliders"></i>&nbsp;Blog Management</a></li>
        <li class="<?php echo ($page=="blogs.php")?"active" :""; ?>"><a href="blogs.php"><i class="fa
        fa-book"></i>&nbsp;Add Blogs</a></li>
        <li class="<?php echo ($page=="media.php")?"active" :""; ?>"><a href="#"><i class="fa
        fa-file-photo-o"></i>&nbsp;Media Management</a></li>
    </ul>
</div>