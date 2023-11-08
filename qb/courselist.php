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
    <title>Course List</title>
</head>

<body>



    <div class="container my-4">
        <h2 class="text-center my-5">Student Room - Question Bank</h2>
        <div class="row my-5">


            <div class="card text-center " style="width: 1200px;">
                <div class=" card-header">
                    CSE 2213
                </div>
                <div class="card-body">
                    <h5 class="card-title">Discrete Mathematics</h5>
                    <p class="card-text"> Computer Science Core Course - Logics and Algorithms
                    </p>
                    <a href="dm.php" class="btn btn-primary">View Questions</a>
                </div>

            </div>



            <div class="card text-center my-4" style="width: 1200px;">
                <div class="card-header">
                    CSE 2233
                </div>
                <div class="card-body">
                    <h5 class="card-title">Theory Of Computation</h5>
                    <p class="card-text">Computer Science Core Course - Logics and Algorithms
                    </p>
                    <a href="toc.php" class="btn btn-primary">View Questions</a>
                </div>

            </div>

            <div class="card text-center my-4" style="width: 1200px;">
                <div class="card-header">
                    CSE 3313
                </div>
                <div class="card-body">
                    <h5 class="card-title">Computer Architecture</h5>
                    <p class="card-text">Computer Science Core Course - Hardware
                    </p>
                    <a href="ca.php" class="btn btn-primary">View Questions</a>
                </div>

            </div>
            <div class="card text-center my-4" style="width: 1200px;">
                <div class="card-header">
                    IPE 401
                </div>
                <div class="card-body">
                    <h5 class="card-title">IPE</h5>
                    <p class="card-text">Non-departmental Course - Optional
                    </p>
                    <a href="ipe.php" class="btn btn-primary">View Questions</a>
                </div>

            </div>

        </div>
    </div>


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