<?php

    class Connect{

        public static function connect(){
            try{
                $con = new PDO('mysql:host=localhost:3306; dbname=inkafarma','root','');
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $con->exec("SET CHARACTER SET UTF8");
            }catch(Exception $e){
                die("Errorfdss: ".$e->getMessage().' '.$e->getLine());
            }
            return $con;
        }  
    }
?>