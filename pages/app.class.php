<?php

    class App {

        private $host = 'localhost', $username = 'root', $pwd= '', $db= 'infos';


        function Connect(){
            $dsn = "mysql:host=$this->host;dbname=$this->db";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            try{
                $con = new PDO($dsn, $this->username, $this->pwd, $options);
                return $con;
            } catch (\PDOException $e){
                throw new \PDOException($e->getMessage(),(int)$e->getCode());
            }
        }
    }