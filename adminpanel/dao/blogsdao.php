<?php
@session_start();
require_once "webconfig.php";
class blogsdao extends webconfig
{

    //GET BLOGS COUNT

    function getblogscount()
    {
        $sql="select count(*) as totalrows from tbl_blogs";
        $qry=$this->mysqli->query($sql);
        $res = $qry->fetch_array(MYSQLI_ASSOC);
        return $res;
    }

    function categorygetblogscount($category)
    {
        $sql="select count(*) as totalrows from tbl_blogs where category='$category'";
        $qry=$this->mysqli->query($sql);
        $res = $qry->fetch_array(MYSQLI_ASSOC);
        return $res;
    }



    //GET BLOG LISTS

    function getblogslist($N)
    {
        $result=array();
        $var=array();
        $sql="select * from tbl_blogs ORDER by createddate DESC LIMIT 10 OFFSET ".$N;
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }

    function getblogslistclient()
    {
        $result=array();
        $sql="select * from tbl_blogs WHERE status='active' ORDER by createddate DESC LIMIT 5";
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }

    function categorygetblogslist($N,$category)
    {
        $result=array();
        $var=array();
        $sql="select * from tbl_blogs WHERE category='$category' ORDER by createddate DESC LIMIT 10 OFFSET ".$N;
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }



    //CRUD Operations

    function addblogs($title,$metadata,$keyword,$description,$status,$coverimage,$category)
    {
        $date=date("Y-m-d h:i:sa");
        $user=$_SESSION['username'];
        $sql="INSERT INTO tbl_blogs
              (title,metadata,keyword,description,status,coverimage,category,createddate,createdby) VALUES
              ('$title','$metadata','$keyword','$description','$status','$coverimage','$category','$date',
              '$user')";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            $result['errorcode']=0;
            $result['msg']="Blog Add Success!!!";
            return $result;
        }
        else
        {
            $result['errorcode']=1;
            $result['msg']="Blog Add Failed!!!";
            return $result;
        }
    }

    function deleteindividualblogs($id,$image)
    {
        $sql="delete from tbl_blogs where sn='$id'";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            unlink('images/'.$image);
            $result['errorcode']=0;
            $result['msg']="Blog Deleted Successfully!!!";
            return $result;
        }
        else
        {
            $result['errorcode']=1;
            $result['msg']="Blog Delete Failure!!!";
            return $result;
        }
    }

    function changesstatus($id)
    {
        $sql="update tbl_blogs set status = CASE
              WHEN status = 'active' THEN 'nactive'
              WHEN status = 'active' THEN 'nactive'
              ELSE 'active'
              END
              where sn='$id'" ;
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            $result['errorcode']=0;
            $result['msg']="Status Changed Successfully!!!";
            return $result;
        }
        else
        {
            $result['errorcode']=1;
            $result['msg']="Status Change Failure!!!";
            return $result;
        }
    }

    public function getblogdetails($bid)
    {
        $sql="select * from tbl_blogs where sn='$bid'";
        $qry=$this->mysqli->query($sql);
        $result=$qry->fetch_array(MYSQLI_ASSOC);
        if(count($result)>0)
        {
            $result['errorcode']=0;
            $result['msg']="Blog Available";
            return $result;
        }
        else
        {
            $result['errorcode']=1;
            $result['msg']="Blog Not Available!!!";
            return $result;
        }
    }

    public function getblogdetailsforedit($eid)
    {
        $sql="select * from tbl_blogs where sn='$eid'";
        $qry=$this->mysqli->query($sql);
        $result=$qry->fetch_array(MYSQLI_ASSOC);
        if(count($result)>0)
        {
            $result['errorcode']=0;
            $result['msg']="Blog Available";
            return $result;
        }
        else
        {
            $result['errorcode']=1;
            $result['msg']="Blog Not Available!!!";
            return $result;
        }
    }

    function editblogs($sn,$title,$metadata,$keyword,$description,$status,$category)
    {
        $date=date("Y-m-d h:i:sa");
        $user=$_SESSION['username'];
        $sql="UPDATE tbl_blogs SET title='$title',metadata='$metadata',keyword='$keyword',description='$description',status='$status',category='$category',modifieddate='$date',modifiedby='$user'
              WHERE sn='$sn'";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            $result['errorcode']=0;
            $result['msg']="Blog Edit Success!!!";
            return $result;
        }
        else
        {
            $result['errorcode']=1;
            $result['msg']="Blog Edit Failed!!!";
            return $result;
        }
    }


}