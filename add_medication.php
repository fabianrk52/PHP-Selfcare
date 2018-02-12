<?php
include 'server/data/db.php';
include 'server/data/config.php';
include 'server/data/functions.php';

check_session();

if(isset($_POST['medID']) && isset($_POST['expiryDate'])){

    $medID = mysqli_real_escape_string($connection, $_POST['medID']);
    $expiryDate = mysqli_real_escape_string($connection, $_POST['expiryDate']);
    $userID = $_SESSION["user_id"];

    $query = "INSERT INTO 247_user_meds (`Med_id`,`Expiry_date`,`User_id`,`ID`) VALUES ('$medID', '$expiryDate', '$userID','$medID')";
    
    if(mysqli_query($connection, $query)){
       $flag=1;
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
 }

$query="SELECT `Name`, `Med_id` FROM 247_medication WHERE 1";

$result = mysqli_query($connection, $query);
$medList = array();
while($row = mysqli_fetch_assoc($result)) {
$medList[] = $row;   
} 
$connection->close();  
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
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="includes/css/style.css">
        <title>SelfCare</title>
    </head>

    <body id="wrapper">
        <header>
            <a href="main.php" class="logo"></a>
        </header>
        <main id=main class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Add Medicine</h1>
                </div>    
            </div>
            <div>
                <form action="#" method="post">
                    <div class="row mt-2">
                        <div class="col-12">
                            <label >Choose medication: <br>
                            <select name="medID">
                            <?php
                                foreach($medList as $key){
                                    echo '<option value="'.$key["Med_id"].'">'.$key["Name"].'</option>';
                                    }   
                                ?>
                            </select> </label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                                <label>Enter expiry date: <br>
                                    <input type="date" name="expiryDate" placeholder="Expiry date" required>
                                </label>
                        </div>
                    </div>          
                    <div class="row mt-3">
                        <div class="col-12">  
                            <input type="submit" value="Save" class="btn btn-success">
                        </div>
                    </div>
                </form>     
            </div>
            <div class="row mt-5">
                <div class="col-12">  
                    <a href="medication.php"><div id="back"></div></a>
                </div>
            </div>
        </main>
        <footer> <p>&copy Amit Shwartz & Fabian Roitman</p></footer>
    </body>
    <?php
    if(isset($flag)){
        echo '<script> swal("Medication added!", "", "success");</script>';
    }
    ?>
</html>