<?php

class SQLConnection
{
    var $servername;
    var $username;
    var $password;
    var $dbname;
    var $conn;

    /**
     * SQLConnection constructor.
     * @param $servername
     * @param $username
     * @param $password
     * @param $dbname
     */
    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    /**
     * @return mixed
     */
    public function getServername()
    {
        return $this->servername;
    }

    /**
     * @param mixed $servername
     */
    public function setServername($servername)
    {
        $this->servername = $servername;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @param mixed $dbname
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }


    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param mixed $conn
     */
    public function setConn($conn)
    {
        $this->conn = $conn;
    }

    /**
     *
     */
    public function sqlConnect(){
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($this->conn, 'utf8');
        if(!$this->conn){
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    /**
     *
     */
    public function sqlQuery($sql){
        $result = mysqli_query($this->conn, $sql);
        if(!$result){
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
        return $result;
    }

    /**
     * @return int|string
     */
    public function getLastIdInsert(){
        return mysqli_insert_id($this->conn);
    }

    /**
     * @param $sql
     * @return array|null
     */
    public function selectQuery($sql){
        $result = $this->sqlQuery($sql);
        return mysqli_fetch_array($result);
    }

    /**
     *
     */
    public function sqlDisconnect(){
        mysqli_close($this->conn);
    }
}