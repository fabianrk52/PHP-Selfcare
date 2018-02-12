<?php
include 'server/data/db.php';
include 'server/data/config.php';
include 'server/data/functions.php';

check_session();
$medID = mysqli_real_escape_string($connection, $_GET['medID']);
if(isset($medID)){

  $query="SELECT  `Name`, `Expiry_date`, `Dosage`,`Instruction`,`mg` 
          FROM 247_medication AS M
          INNER JOIN 247_user_meds AS U ON M.Med_id=".$medID."
          WHERE U.User_id ='".$_SESSION["user_id"]."'";

  $result=mysqli_query($connection, $query);
  $row=mysqli_fetch_assoc($result);

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
      <link rel="stylesheet" href="includes/css/style.css">
      <title>SelfCare</title>
  </head>

  <body id="wrapper">
     <header>
        <a href="main.php" class="logo"></a>
      </header>
      <main id="main" class="container">
      <?php
      echo   '<div class="list-group-item-primary">
            <span class="h1 bold">'.$row["Name"].'</span>
          </div>
          <div class="h3 mt-4">
            <p>'.$row["mg"].'mg</p> 
              <span class="bold red">Expiry Date: '. $row["Expiry_date"].'</span>
              <p class="mt-3">Dosage:</p> 
            <p>'.$row["Dosage"].'</p>
          <p</p>Instruction:</p>
            <p class="smaltext">'.$row["Instruction"].' </p>
        <a href="#"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span class="h4">Prescription</span></a>
        </div>';
        ?>
         <div class="row mt-5">
                <div class="col-12">  
                    <a href="medication.php"><div id="back"></div></a>
                </div>
            </div>
      </main>
      <footer> <p>&copy Amit Shwartz & Fabian Roitman</p></footer>
  </body>
</html>
