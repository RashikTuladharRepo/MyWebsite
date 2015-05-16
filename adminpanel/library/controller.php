<?php
require_once "getstatic.php";
require_once "../dao/logincheck.php";
    $gs=new getstatic();
    $lc=new logincheck();
    if(isset($_REQUEST['method'])=="logout")
    {
        $gs->logout();
    }