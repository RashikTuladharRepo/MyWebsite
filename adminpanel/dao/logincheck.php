<?php
@session_start();
require_once "webconfig.php";
class logincheck extends webconfig {

    function filterstring($data)
    {
        $result = $data;
        if ($result != "")
        {
            $result=str_replace("'","&rsquo;",$data);
            $result=str_replace("script","",$result);
            $result=str_replace("--","",$result);
            $result=str_replace("[","",$result);
            $result=str_replace("]","",$result);
            $result=str_replace("fopen","",$result);
            $result=str_replace("fclose","",$result);
            $result=str_replace("exec","",$result);
            $result=str_replace("<?","",$result);
            $result=str_replace("<?php","",$result);
            $result=str_replace("?>","",$result);
            //$result=str_replace(";","",$result);
            //$result=str_replace("&"," and ",$result);
            return $result;
        }
        return $result;
    }

    function login()
    {
        $user=$this->filterstring($_POST['username']);
        $pass=md5($this->filterstring($_POST['password']));
        $sql="SELECT * FROM tbl_adminlogin where BINARY username=BINARY '$user' AND BINARY password=BINARY'$pass'";
        $res= $this->mysqli->query($sql);
//        var_dump($res);
        $data=$res->fetch_array(MYSQLI_ASSOC);
        if ($res->num_rows>0)
        {
            $_SESSION['loginstatus']="true";
            $_SESSION['username']=$data['username'];
            $_SESSION['message']="Login Successfull!!";
            $_SESSION['logindate']=$data['loggedindate'];

            date_default_timezone_set("Asia/Kathmandu");
            $currentuser=$_SESSION['username'];
            $datetime=date("Y-m-d H:i:s");
            $sql1="UPDATE tbl_adminlogin set loggedindate='$datetime' WHERE username='$currentuser'";
            $res1= $this->mysqli->query($sql1);
            header('location:dashboard.php');
        }
        else
        {
            $_SESSION['loginstatus']="false";
            $_SESSION['message']="Ooops!! Missed Some Thing Please Check Your Credentials";
            header('location:index.php');
        }
    }

    function updatelastlogin()
    {
        date_default_timezone_set("Asia/Kathmandu");
        $currentuser=$_SESSION['username'];
        $datetime=date("Y-m-d H:i:s");
        $sql="UPDATE tbl_adminlogin set loggedindate='$datetime' WHERE username='$currentuser'";
        $res= $this->mysqli->query($sql);
        if($res)
        {
            return "success";
        }
        else
        {
            return "fail";
        }
    }
}
?>