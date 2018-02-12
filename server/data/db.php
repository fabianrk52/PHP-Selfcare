<?php
    define("DBHOST","182.50.133.55");
    define("DBUSER", "auxstudDB7c");
    define("DBPASS", "auxstud7cDB1!"); 
    define("DBNAME", "auxstudDB7c");
$connection = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if(mysqli_connect_errno()){
    die("DB Connection failed: ".mysqli_connect_errno()."(");
}