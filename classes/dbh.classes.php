<?php
class Dbh {
    protected function connect(){
        try{
            $server = "localhost";
            $username = "root";
            $password = "root";
            $database = "news_web_page_2";

            $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
            return $conn;

        }catch(PDOException $error){
            die("Connection failed" . $error->getMessage());  //exit()
        }
    }
}
?>