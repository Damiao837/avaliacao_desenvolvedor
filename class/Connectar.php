<?php

class Connectar {

    protected function Connect()
    {

        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "projetoari";
        $port = 3306;

        try {
            $con = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname, $user, $pass);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
            return $con;
        } catch (Exception $exc) {

            $exc->getMessage();
        }
    }

}
