<?php
@session_start();

//dao
include "dao/webconfig.php";
include "dao/blogsdao.php";

//objects
$bd=new blogsdao();

class blogscontroller
{
    function blogsadd()
    {
        $bd=new blogsdao();
        $gs=new getstatic();

        $blogtitle=$gs->filterstring($_POST['blogtitle']);
        $meta=$gs->filterstring($_POST['meta']);
        $keyword=$gs->filterstring($_POST['keywords']);
        $description=$gs->filterstring($_POST['description']);
        $status=$gs->filterstring($_POST['status']);
        $category=$gs->filterstring($_POST['category']);


        //cover image test
        $cover=$_FILES['coverimage']['name'];
        $coverimage=$gs->imagemanipulate($cover);
        if($coverimage['errorcode']=="0")
        {
             $imagename=$coverimage['msg'];
        }
        else
        {
            echo $coverimage['msg'];
            die();
        }
        //cover image ends


        $result=$bd->addblogs($blogtitle,$meta,$keyword,$description,$status,$imagename,$category);


        if($result['errorcode']=="0")
        {
            move_uploaded_file($_FILES['coverimage']['tmp_name'], "images/".$imagename);
            $_SESSION['msg']=$result['msg'];
            header('location:'.$gs->home_base_url().'adminpanel/blogs.php');
            exit();
        }
        else
        {
            $_SESSION['msg']=$result['msg'];
            header('location:'.$gs->home_base_url().'adminpanel/blogs.php');
            exit();
        }
    }


    function getallblogs()
    {
        $bd=new blogsdao();
        return $bd->getblogslist();
    }

    function deleteblog($deleteid)
    {
        $gs=new getstatic();
        if($deleteid!="") {
            $bd = new blogsdao();
            $res=$bd->deleteindividualblogs($deleteid);
            if($res['errorcode']=="0")
            {
                $_SESSION['msg']=$res['msg'];
                header('location:'.$gs->home_base_url().'adminpanel/dashboard.php');
                exit();
            }
            else
            {
                $_SESSION['msg']=$res['msg'];
                header('location:'.$gs->home_base_url().'adminpanel/dashboard.php');
                exit();
            }
        }
        else
        {
            header('location:'.$gs->home_base_url().'adminpanel/dashboard.php');
            exit();
        }
    }

    function changestatus($csid)
    {
        $gs=new getstatic();
        if($csid!="")
        {
            $bd = new blogsdao();
            $res=$bd->changesstatus($csid);
            if($res['errorcode']=="0")
            {
                $_SESSION['msg']=$res['msg'];
                header('location:'.$gs->home_base_url().'adminpanel/dashboard.php');
                exit();
            }
            else
            {
                $_SESSION['msg']=$res['msg'];
                header('location:'.$gs->home_base_url().'adminpanel/dashboard.php');
                exit();
            }
        }
        else
        {
            header('location:'.$gs->home_base_url().'adminpanel/dashboard.php');
            exit();
        }
    }
}




