<?php
@session_start();

//dao
include "dao/webconfig.php";
include "dao/blogsdao.php";

//objects
$bd=new blogsdao();

class blogscontroller
{

    //GET BLOGS COUNT DAO METHOD
    function getblogscount()
    {
        $bd=new blogsdao();
        return $bd->getblogscount();
    }
    function categorygetblogscount($category)
    {
        $bd=new blogsdao();
        return $bd->categorygetblogscount($category);
    }



    //GET ALL BLOGS DAO METHOD
    function getallblogs($N)
    {
        $bd=new blogsdao();
        return $bd->getblogslist($N);
    }
    function getallblogsclient()
    {
        $bd=new blogsdao();
        return $bd->getblogslistclient();
    }
    function categorygetallblogs($N,$category)
    {
        $bd=new blogsdao();
        return $bd->categorygetblogslist($N,$category);
    }
    function getallblogswithpage($N)
    {
        $bd=new blogsdao();
        return $bd->getblogslistwithpage($N);
    }


    //GET BLOG DETAILS DAO
    function getblogdetails($bid)
    {
        $bd=new blogsdao();
        return $bd->getblogdetails($bid);
    }



    //BLOGS CRUD DAO METHOD
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
    function deleteblog($deleteid,$coverimage)
    {
        $gs=new getstatic();
        if($deleteid!="") {
            $bd = new blogsdao();
            $res=$bd->deleteindividualblogs($deleteid,$coverimage);
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
    function editblog($eid)
    {
        $gs=new getstatic();
        $bd=new blogsdao();
        $returnvalues=$bd->getblogdetailsforedit($eid);
        $_SESSION['editblogsdetail']= $bd->getblogdetailsforedit($eid);
        header('location:'.$gs->home_base_url().'adminpanel/blogs.php?data='.$returnvalues['errorcode']);
    }
    function blogsedit()
    {
        $bd=new blogsdao();
        $gs=new getstatic();

        $sn=$gs->filterstring($_POST['blogid']);
        $blogtitle=$gs->filterstring($_POST['blogtitle']);
        $meta=$gs->filterstring($_POST['meta']);
        $keyword=$gs->filterstring($_POST['keywords']);
        $description=$gs->filterstring($_POST['description']);
        $status=$gs->filterstring($_POST['status']);
        $category=$gs->filterstring($_POST['category']);


        $result=$bd->editblogs($sn,$blogtitle,$meta,$keyword,$description,$status,$category);


        if($result['errorcode']=="0")
        {
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


    //Category Section
    function addcategory()
    {
        $gs=new getstatic();
        $bd=new blogsdao();
        $category=$_POST['category'];
        $result=$bd->addcategory($category);
        if($result['errorcode'])
        {
            $_SESSION['msg']=$result['msg'];
            header('location:'.$gs->home_base_url().'adminpanel/category.php');
            exit();
        }
        else
        {
            $_SESSION['msg']=$result['msg'];
            header('location:'.$gs->home_base_url().'adminpanel/category.php');
            exit();
        }
    }

    function getcategorylist()
    {
        $bd=new blogsdao();
        return $bd->getcategorylistdao();
    }

    function deletecategory($did)
    {
        $bd=new blogsdao();
        $gs=new getstatic();
        $result=$bd->deletecategorylistdao($did);
        if($result['errorcode']=="0")
        {
            $_SESSION['msg']=$result['msg'];
            header('location:'.$gs->home_base_url().'adminpanel/category.php');
            exit();
        }
        else
        {
            $_SESSION['msg']=$result['msg'];
            header('location:'.$gs->home_base_url().'adminpanel/category.php');
            exit();
        }
    }

}




