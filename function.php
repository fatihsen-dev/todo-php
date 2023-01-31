<?php

class main
{
    public $serverName = "localhost";
    public $userName = "root";
    public $password = "";
    public $database = "todos";
    public $connection;
    public $conn;
    public $text;
    public $status;
    public $created;

    function __construct()
    {
        // connection mysql
        $this->conn = mysqli_connect($this->serverName, $this->userName, $this->password);

        $sql = "CREATE DATABASE IF NOT EXISTS todos CHARACTER SET utf8";
        $response = mysqli_query($this->conn, $sql);
        
        $this->connection = mysqli_connect($this->serverName, $this->userName, $this->password, $this->database);
        
        $sql = "CREATE TABLE IF NOT EXISTS todo(id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,`text` VARCHAR(50) NOT NULL, status VARCHAR(50) NOT NULL, created VARCHAR(50))";
        $response = mysqli_query($this->connection, $sql);
        
        if (!$this->connection) {
            // bağlanılamadı!
            die(mysqli_connect_error());
        } else {
            // Bağlandı
        }
    }

    // New todo function
    function newTodo($text)
    {
        $status = "new";
        $created = date("Y-m-d");
        $sql = "INSERT INTO todo SET text='$text',status='$status', created='$created'";
        $response = mysqli_query($this->connection, $sql);
        $add = $_SERVER['REQUEST_URI'];
        header("location: $add");
    }
    // get todos function
    function allTodo()
    {
        $arr = array();
        $sql = "SELECT * FROM todo ORDER BY id DESC";
        $response = mysqli_query($this->connection, $sql);

        while ($row = mysqli_fetch_assoc($response)) {
            $arr[] = $row;
        }
        return $arr;
    }
    // delete todo function
    function deleteTodo($id)
    {

        $sql = "DELETE FROM todo where id='$id'";
        $response = mysqli_query($this->connection, $sql);
        $add = $_SERVER['REQUEST_URI'];
        header("location: $add");
    }
    // delete todo function
    function updateTodo($text, $id)
    {

        $sql = "UPDATE todo SET text='$text' where id='$id'";
        $response = mysqli_query($this->connection, $sql);
        $add = $_SERVER['REQUEST_URI'];
        header("location: $add");
    }
}
