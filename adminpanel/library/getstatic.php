<?php
@session_start();

class getstatic
{
    function home_base_url(){

        // first get http protocol if http or https

        $base_url = (isset($_SERVER['HTTPS']) &&
            $_SERVER['HTTPS']!='off') ? 'https://' : 'http://';

        // get default website root directory

        $tmpURL = dirname(__FILE__);

        // when use dirname(__FILE__) will return value like this "C:\xampp\htdocs\my_website",

        //convert value to http url use string replace,

        // replace any backslashes to slash in this case use chr value "92"

        $tmpURL = str_replace(chr(92),'/',$tmpURL);

        // now replace any same string in $tmpURL value to null or ''

        // and will return value like /localhost/my_website/ or just /my_website/

        $tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);

        // delete any slash character in first and last of value

        $tmpURL = ltrim($tmpURL,'/');

        $tmpURL = rtrim($tmpURL, '/');

        // check again if we find any slash string in value then we can assume its local machine

        if (strpos($tmpURL,'/')){

            // explode that value and take only first value

            $tmpURL = explode('/',$tmpURL);

            $tmpURL = $tmpURL[0];

        }

// now last steps

// assign protocol in first value

        if ($tmpURL !== $_SERVER['HTTP_HOST'])

// if protocol its http then like this

            $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'/';

        else

// else if protocol is https

            $base_url .= $tmpURL.'/';

// give return value

        return $base_url;


// and test it
//echo home_base_url();
//local machine : http://localhost/my_website/ or https://myhost/my_website
//public : http://www.my_website.com/ or https://www.my_website.com/
//<script type="text/javascript" src="'.home_base_url().'js/script.js"></script>

    }

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

    function checksession()
    {
        if(isset($_SESSION['loginstatus'])!="true" || $_SESSION['loginstatus']=="" || $_SESSION['logindate']=="" || $_SESSION['message']=="" || $_SESSION['username']=="")
        {
            $_SESSION['message']="Please Login First";
            header('location:index.php');
        }
    }

    function logout()
    {
        @session_destroy();
        @session_start();
        $_SESSION['message']="Bye! For Now Will See You Soon";
        header('location:'.$this->home_base_url().'adminpanel/index.php');
    }


    function getuser()
    {
        return $_SESSION['username'];
    }

    function imagemanipulate($image)
    {
        date_default_timezone_set("Asia/Kathmandu");
        $result=array();
        $explode=explode('.', $image);
        if($explode[1]=="" || $explode[1]=="jpg" || $explode[1]=="JPG" || $explode[1]=="PNG" || $explode[1]=="png") {
            $coverimage = md5(date("Y-d-m H:i:s") . $explode['0']) . "." . $explode['1'];
            $result['errorcode']=0;
            $result['msg']=$coverimage;
            return $result;
        }
        else
        {
            $result['errorcode']=1;
            $result['msg']="invalid image type";
            return $result;
        }
    }

}