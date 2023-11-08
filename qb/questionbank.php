<?php
session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/studentroom/partials/_dbconnect.php";
    include_once($path);
    ?>
<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/studentroom/partials/_nav.php";
    include_once($path);
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

    <link rel="stylesheet" href="css/style.css">
    <title>Question Bank</title>
</head>

<body>
    <div class="container my-4">
        <h2 class="text-center my-5">Student Room - Question Bank</h2>
        <div class="row my-5">


            <div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                    <img src="images/still-life-851328_960_720 1.png" class="d-block w-100" alt="...">
                    <div class="card-body">

                        <h5 class="card-title"><a href="questionuploadform.php">Upload Question</a></h5>
                        <p class="card-text">Upload the questions you want to share</p>
                        <a href="questionuploadform.php" class="btn btn-primary" style="float:right;">View Section</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                    <img src="images/still-life-851328_960_720 1.png" class="d-block w-100" alt="...">
                    <div class="card-body">

                        <h5 class="card-title"><a href="courselist.php">Course List</a></h5>
                        <p class="card-text">See the qustions of the courses in this section</p>
                        <a href="courselist.php" class="btn btn-primary" style="float:right;">View Section</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                    <img src="images/still-life-851328_960_720 1.png" class="d-block w-100" alt="...">
                    <div class="card-body">

                        <h5 class="card-title"><a href="questionrequest.php">Request Questions</a></h5>
                        <p class="card-text">Request the questions you need, in this section</p>
                        <a href="questionrequest.php" class="btn btn-primary" style="float:right;">View Section</a>
                    </div>
                </div>
            </div>


        </div>
    </div>

</body>

</html>