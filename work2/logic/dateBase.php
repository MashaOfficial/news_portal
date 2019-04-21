<?php
/**
 * Created by PhpStorm.
 * User: gt99
 * Date: 18.04.2019
 * Time: 23:52
 */

class dateBase
{
    private $host = "localhost";
    private $username = "a0272576_work2";
    private $password = "123qwe0123qwe";
    private $dbname = "a0272576_work2";
    private $conn;

    function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
    }

    function getConn(){
        return $this->conn;
    }



}
