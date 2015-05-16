<?php
/**
 * Created by PhpStorm.
 * User: Rashik
 * Date: 5/2/2015
 * Time: 12:12 PM
 */
$browser="";
     if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("MSIE"))){$browser="IE";}
     else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("Presto"))){$browser="Opera";}
     else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("CHROME"))){$browser="Chrome";}
     else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("SAFARI"))){$browser="Safari";}
     else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("FIREFOX"))){$browser="Firefox";}
     else {$browser="Other";}
?>