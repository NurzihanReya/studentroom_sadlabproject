<?php
$showAlert = false;
$showError = false;
//if($_SERVER["REQUEST_METHOD"] == "POST"){
  //$_SERVER['REQUEST_METHOD'] fetches the request method used to access the page. 
    //Request methods are 'GET', 'HEAD', 'POST', 'PUT'
    include 'partials/_dbconnect.php';
    $method = $_SERVER['REQUEST_METHOD'];

    if(isset($_POST["Submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];  //PHP $_POST is a PHP super global variable which is used to collect form data after submitting an HTML form with method="post".
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $bloodgroup = $_POST["bloodgroup"];
    $images= addslashes(file_get_contents($_FILES["images"]["tmp_name"]));

    //check for duplicate user
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0)
    {
        $exists=true;
        $showError = "email already exists. If you already have an account, please visit the Login page.";
    }
    else
    {
        //$exists = false;
        if($password == $cpassword){
            $sql = "INSERT INTO `users` (`name`, `username`, `password`, `dt`, `blood_group`,`images`) VALUES ('$name', '$username', '$password', current_timestamp(), '$bloodgroup','$images')";
            $result = mysqli_query($conn, $sql);
            if ($result)
            {
                $showAlert = true;
            }
        }
        else
        {
            $showError = "Passwords do not match.";
        }
    }
    
    //When a user submits the data by clicking on "Submit", the form data is sent to the file specified in the action attribute of the <form> tag.
}
    
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
</head>

<body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert){


    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success! Your account is now created and you can login.');
    window.location.href='login.php';
    </script>");



    //header("location: signup.php");
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
        <h1 class="text-center">Signup to Student Room</h1>
        <form action="/studentroom/signup.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="username">Email</label>
                <input type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="bloodgroup">Blood group</label>
                <input type="text" class="form-control" id="bloodgroup" name="bloodgroup">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
            </div>
            <div class="form-group">
                <label for="images">Upload Profile Picture</label>
                <input type="file" class="form-control" id="images" name="images">
            </div>


            <button type="submit" name="Submit" value="submit" class="btn btn-primary">SignUp</button>

        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>