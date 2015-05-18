<?php
@session_start();
require_once "webconfig.php";
class blogsdao extends webconfig
{
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

    function getblogslist()
    {
        $result=array();
        $var=array();
        $sql="select * from tbl_blogs ORDER by createddate DESC";
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }

    function deleteindividualblogs($id)
    {
        $sql="delete from tbl_blogs where sn='$id'";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
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


}