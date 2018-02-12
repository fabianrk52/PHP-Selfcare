<?php
    include '/server/data/db.php';
    include '/server/data/config.php';

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
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script
        src="https://code.jquery.com/jquery-3.2.1.slim.js"
        integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg="
        crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="includes/css/style.css">
        <title>SelfCare</title>
    </head>


    <body id="wrapper">
        <main id="main" class="container">
         
                    <a href="#" class="logLogo"></a><br><br>
                    <form action="#" method="POST">
                        <label>Enter ID:</label><br>
                        <input type="text" name="user_id" required><br><br><br>
                        <input type="image" src="includes/images/fingerprint.png" alt="Submit" height="50px">
                        <p class="errMsg"> <?php if(isset($massage)) {echo $massage;} ?></p>
                    </form>      
        </main>
    </body>
</html>

<?php mysqli_close($connection); ?>