<?php
    include 'server/data/db.php';
    include 'server/data/config.php';
    include 'server/data/functions.php';
    
    check_session();

    if(isset($_GET['Phone'])){
        $Phone = mysqli_real_escape_string($connection, $_GET['Phone']);
        $query = 'UPDATE `247_user` SET  `Phone` =  "'.$Phone.'" WHERE `User_id`="'.$_SESSION["user_id"]. '"';
        if(mysqli_query($connection, $query)){
            $flag=1;
         } else{
             echo "ERROR: Could not able to execute $query. " . mysqli_error($connection);
         }
    }
    if(isset($_GET['Email'])){
        $Email = mysqli_real_escape_string($connection, $_GET['Email']);
        $query = 'UPDATE `247_user` SET  `Email` =  "'.$Email.'" WHERE `User_id`="'.$_SESSION["user_id"]. '"';
        if(mysqli_query($connection, $query)){
            $flag=1;
         } else{
             echo "ERROR: Could not able to execute $query. " . mysqli_error($connection);
         }
    }


    $query="SELECT  `img` FROM 247_user WHERE User_id ='".$_SESSION["user_id"]."'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="includes/css/style.css">
    <title>SelfCare</title>
</head>


<body id="wrapper">
    <header>
            <a href="main.php" class="logo"></a>
    </header>
    <main id=main class="container">
    <div class="row">
        <div class="col-6"> 
        <p class="textInBox">David</p>
            <?php echo '<img src="'.$row["img"].'" class="profile profile-size">';?>
        </div>
        <div class="col-6">
        <form action="#" method="GET">
            <div class="form-group">
                <label for="Name" class="textInBox">Name</label>
                <input type="text" class="form-control mt-1" placeholder="David" readonly>
                <label for="Surname" class="textInBox mt-2">Surname</label>
                <input type="text" class="form-control" placeholder="Polisanov" readonly>
            </div>     
        </div>
    </div>
        <div class="form-row align-items-end mt-3">
            <div class="col-6">
                <div class="form-group">
                    <label for="email" class="textInBox">Email</label>
                    <input type="email" name="Email" class="form-control" placeholder="name@example.com">
                </div>  
            </div>
            <div class="col-6">
            <div class="form-group">
                <label for="PhoneNumber" class="textInBox">Phone</label>
                <input type="tel" name="Phone" class="form-control" placeholder="050-12345678">
            </div>  
            </div>
        </div>
            <div class="form-row mt-3">
            <div class="col-12">
                <input type="submit" value="Update" class="btn btn-success">  
                <a class="btn btn-cancel " href="main.php">Cancel</a>
            </div>
                
            </div>
            </form>
        </div>
    </main>
    <footer> <p>&copy Amit Shwartz & Fabian Roitman</p></footer>
        <?php
           if(isset($flag)){
             echo '<script> swal("Updated Succesfuly !", "", "success");</script>';
             }
          ?>
    </body>
</html>
