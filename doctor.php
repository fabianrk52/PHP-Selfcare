<?php
include 'server/data/db.php';
include 'server/data/config.php';
include 'server/data/functions.php';

check_session();
$docID = mysqli_real_escape_string($connection, $_GET['docID']);
if(isset($docID)){
  $query="SELECT  `Doc_name`, `Address`, `Spec`,`img`,`Date` 
          FROM 247_Doctors AS D
          INNER JOIN 247_user_appointment AS U ON D.Doc_id=".$docID."
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
        <main id=main class="container">
        <?php
            echo '<div class="row">
                        <div class="col-12">
                            <p class="h1">Dr.'.$row["Doc_name"].'</p>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-12 mt-2"> 
                    <img src="'.$row["img"].'" class="profile profile-size"><br>
                    <h4>'.$row["Spec"].'</h4>
                    </div>
                </div> 
                    <div class="col-12 mt-2">
                        <h5>Address:</h5>
                        <p>'.$row["Address"].'</p>
                        <a href="#" id="log"> 
                        <i class="fa fa-calendar-plus-o fa-2x fa-border"></i>
                     </a>  
                      <a href="#" id="log"> 
                            <i class="fa fa-thumb-tack fa-2x fa-border"></i>
                         </a> 
                    </div>
                    <div class="col-12 mt-4">
                         <h5>next appointment:</h5>
                         <p class="red"><b>'.$row["Date"].'</b></p>
                   </div>
                </div>';
             ?> 
                    <div class="row mt-3">
                         <div class="col-12">  
                             <a href="appointments.php"><div id="back"></div></a>
                         </div>
                 </div>
         </main>
        <footer> <p>&copy Amit Shwartz & Fabian Roitman</p></footer>
    </body>

</html>
