<?php
abstract class DbControl {
    protected $conn;
    protected $host;
    protected $dbName;
    protected $username;

    public function __construct($host, $dbName, $username, $password)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
    }
}
?>
