<?php
class webconfig {
    private $host = "localhost";
    private $db = "rashikblog";
    private $user = "root";
    private $pass = "";
    protected $mysqli;
    function __construct()
    {
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->mysqli->error)
        {
            echo($this->mysqli->error);
        }

        else
        {
            //echo "connection successful";
        }
    }
}