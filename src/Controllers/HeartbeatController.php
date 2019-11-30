<?php

namespace App\Controllers;


    use Components\Database\OracleConnector;
    use Components\Database\PostgreSqlConnector;

    class HeartbeatController extends ControllerManager{
    
        public function ping(){
            return $this->success('I`m alive!');
        }

        public function connect(){
            $test = new PostgreSqlConnector();

var_dump($test->connect());exit;
            return $test->connect();
        }
    }