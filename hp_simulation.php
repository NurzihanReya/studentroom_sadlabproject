<?php

session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

    
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Simulations</title>
</head>

<body>

    <?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/studentroom/partials/_nav.php";
    include_once($path);
?>

    <!-- Image cards -->
    <center>
        <div class="container my-4" id="ques">
            <h2 class="text-center my-4">Student Room - Simulations</h2>

            <div class="row">
                <div class="col-sm-5 my-4 mx-3">
                    <img src="images/sorting.png" height="300px" width="100px" class="card-img-top" alt="ms">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Merge Sort</h5>
                            <p class="card-text">Click here to learn about Merge Sort.</p>
                            <a href="mergesort/index.php" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>



                <div class="col-sm-5 my-4 mx-3">
                    <img src="images/tree.png" height="300px" width="100px" class="card-img-top" alt="bpt">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">B+ Tree</h5>
                            <p class="card-text">Click here to learn about B+ Tree.</p>
                            <a href="bptree/bptree.php" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5 my-4 mx-3">
                    <img src="images/mst.png" height="300px" width="100px" class="card-img-top" alt="pa">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Prim's Algorithm</h5>
                            <p class="card-text">Click here to learn about Prim's Algorithm.</p>
                            <a href="prims/prims.php" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5 my-4 mx-3">
                    <img src="images/cf.png" height="300px" width="100px" class="card-img-top" alt="cf">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cycle Detection</h5>
                            <p class="card-text">Click here to learn about Cycle Detection.</p>
                            <a href="cycledet/cycledet.php" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5 my-4 mx-3">
                    <img src="images/nqueen.png" height="300px" width="100px" class="card-img-top" alt="nqp">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">N Queens Problem</h5>
                            <p class="card-text">Click here to learn about N Queens Problem.</p>
                            <a href="nqueens/simulation.php" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    </center>
</body>

</html>