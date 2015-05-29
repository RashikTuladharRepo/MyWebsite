<?php
$uri= $_SERVER['REQUEST_URI'];
$array=explode("/",$uri);
$count=count($array);
$page=trim(strtolower($array[$count-1]));

//echo $page=trim($page);
?>

<div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $baseurl; ?>index.php"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo $baseurl; ?>index"
                       class="<?php echo ($page=="index"||$page=="")?"active" :""; ?>">
                        HOME
                    </a>
                </li>
                <li>
                    <a href="<?php echo $baseurl; ?>blogs/php"
                        class="<?php echo ($page=="php")?"active" :""; ?>">
                        PHP
                    </a>
                </li>
                <li>
                    <a href="<?php echo $baseurl; ?>blogs/ASP"
                       class="<?php echo ($page=="asp")?"active" :""; ?>">
                        .NET
                    </a>
                </li>
                <li>
                    <a href="<?php echo $baseurl; ?>blogs/MYSQL"
                       class="<?php echo ($page=="mysql")?"active" :""; ?>">
                        MySQL
                    </a>
                </li>
                <li>
                    <a href="<?php echo $baseurl; ?>blogs/MSSQL"
                       class="<?php echo ($page=="mssql")?"active" :""; ?>">
                        MSSQL
                    </a>
                </li>
                <li>
                    <a href="<?php echo $baseurl; ?>blogs/BOOTSTRAP"
                       class="<?php echo ($page=="bootstrap")?"active" :""; ?>">
                        BOOTSTRAP
                    </a>
                </li>
                <li>
                    <a href="<?php echo $baseurl; ?>blogs/NEWS"
                       class="<?php echo ($page=="news")?"active" :""; ?>">
                        TECH NEWS
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>

<!--<div class="searchbar">-->
<!--    <div class="input-group">-->
<!--        <input type="text" class="form-control" placeholder="Search for...">-->
<!--            <span class="input-group-btn">-->
<!--                <input type="submit" class="btn btn-success" value="Search..">-->
<!--            </span>-->
<!--    </div>-->
<!--</div>-->







<!--                <li class="text-center" style="line-height: 80px; color: darkgrey">-->
<!--                    <i class="fa fa-clock-o"></i>-->
<!--                    <i id="clock"></i>,-->
<!--                    --><?php //echo $browser; ?>
<!--                </li>-->