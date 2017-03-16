<?php


session_start();
try{
   $cnx = new PDO("mysql:host=localhost;dbname=m2l;charset=utf8","root","");
    
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>