<?php

namespace Components\Database;

    use Settings\Settings;

    /**
     * Classe resposável por Conectar ao banco MySql.
     * 
     * @author André Gapar <and_lrg@hotmail.com>
     */
    class PostgreSqlConnector{

        protected $conn;
        private $conString = "host=%s port=%s dbname=%s user=%s password=%s";
        
        function __construct(){
            $this->connect();
        }

        public function connect(){
            $set = Settings::getSettings();

            $conString = sprintf(
                $this->conString,
                $set['host'],
                $set['port'],
                $set['database'],
                $set['user'],
                $set['password']
            );
var_dump(oci_connect($conString));
            $this->conn = pg_connect($conString);

            if ($this->conn->connect_errno > 0) {
                die("Connection failed [" . $this->conn->connect_error . "]");
            }
        }

        public function lastId(){
            return $this->conn->insert_id;
        }

        public function close(){
            $this->conn = null;
        }
    
    }
?>