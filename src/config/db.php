<?php

    class db {
        // Produccion
        // Produccion
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';

        private $database = 'smartstock';

        public function connect() {

            $connection_mysql = "mysql:host=$this->host;dbname=$this->database";
            
            $connection_db = new PDO($connection_mysql, $this->user, $this->password);
            $connection_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //codificación utf8
            $connection_db -> exec("set names utf8");

            return $connection_db;
        }

    }

?>
