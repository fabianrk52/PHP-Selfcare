<?php
    function check_session(){
         session_start();
         if(!isset($_SESSION["user_id"])){
             header('Location :'. URL .'index.php');
         }
}

    function login(){
        session_start();
        if(!empty($_POST["user_id"])){
            $query="SELECT * FROM 247_user WHERE User_id='".$_POST["user_id"]."'";
            $result=mysqli_query($connection, $query);
            $row=mysqli_fetch_array($result);
    
            if(is_array($row)){
                $_SESSION["user_id"]=$row['User_id'];
                header('Location:'. URL .'main.php');
            } else{
                $massage="invalid user id!";
            }
        }
    }
?>