<?php
$uri= $_SERVER['REQUEST_URI'];
$array=explode("/",$uri);
$count=count($array);
$page=trim(strtolower($array[$count-1]));

//echo $page=trim($page);



$countphp=$bc->getcategoryblogscount("php");
$phpcount= $countphp['count'];

$countasp=$bc->getcategoryblogscount("asp");
$aspcount= $countasp['count'];

$countmysql=$bc->getcategoryblogscount("mysql");
$mysqlcount= $countmysql['count'];

$countmssql=$bc->getcategoryblogscount("mssql");
$mssqlcount= $countmssql['count'];

$countbootstrap=$bc->getcategoryblogscount("bootstrap");
$bootstrapcount= $countbootstrap['count'];

$countjs=$bc->getcategoryblogscount("js");
$jscount= $countjs['count'];

$countnews=$bc->getcategoryblogscount("news");
$newscount= $countnews['count'];

if(isset($_POST['search']))
{
    $_SESSION['search']=$_POST['search_text'];
    header('location:'.$baseurl.'search');
    //echo'<script>window.location="'.$baseurl.'search";</script>';
}
if(isset($_SESSION['search'])) {
    $searchtxt=$_SESSION['search'];
}
else
{
    $searchtxt="";
}
?>

<div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $baseurl; ?>"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
<!--                <li>-->
<!--                    <a href="--><?php //echo $baseurl; ?><!--index"-->
<!--                       class="--><?php //echo ($page=="index"||$page=="")?"active" :""; ?><!--">-->
<!--                        home-->
<!--                    </a>-->
<!--                </li>-->
                <li>
                    <a href="<?php echo $baseurl; ?>blogs/php"
                        class="<?php echo ($page=="php")?"active" :""; ?>">
                        php <i class="icon rashik-prog-phplight"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $baseurl; ?>blogs/ASP"
                       class="<?php echo ($page=="asp")?"active" :""; ?>">
                        .net <i class="icon rashik-prog-aspnet"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $baseurl; ?>blogs/MYSQL"
                       class="<?php echo ($page=="mysql")?"active" :""; ?>">
                        mysql <i class="icon rashik-dbs-mysql"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $baseurl; ?>blogs/MSSQL"
                       class="<?php echo ($page=="mssql")?"active" :""; ?>">
                        mssql <i class="icon rashik-dbs-sqlserver"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $baseurl; ?>blogs/BOOTSTRAP"
                       class="<?php echo ($page=="bootstrap")?"active" :""; ?>">
                        bootstrap <i class="icon rashik-bootstrap"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $baseurl; ?>blogs/JS"
                       class="<?php echo ($page=="others")?"active" :""; ?>">
                        JS/Jquery <i class="icon rashik-prog-jquery"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $baseurl; ?>blogs/NEWS"
                       class="<?php echo ($page=="news")?"active" :""; ?>">
                        tech news <i class="fa fa-newspaper-o"></i>
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>

<div class="searchbar">
    <form method="post" action="#">
        <div class="input-group">
            <input type="text" class="form-control" name="search_text"
                   placeholder="Search for..." value="<?php
                        echo ($searchtxt=="")?"" :$searchtxt;
            ?>" required="required">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-success" name="search"><i class="fa fa-search"></i>
                        Search</button>
                </span>
        </div>
    </form>
</div>







<!--                <li class="text-center" style="line-height: 80px; color: darkgrey">-->
<!--                    <i class="fa fa-clock-o"></i>-->
<!--                    <i id="clock"></i>,-->
<!--                    --><?php //echo $browser; ?>
<!--                </li>-->