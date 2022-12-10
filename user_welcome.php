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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Student Room</title>
</head>

<body>

    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_nav.php'; ?>




    <!-- Slider starts here 
    <h4 class="alert-heading">Welcome admin - <?php echo $_SESSION['username']?></h4> -->


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="slider1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="slider2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="minimal-coding-wallpaper-by-natan-cieplinski-on-.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <!-- Category container start-->
    <div class="container my-4" id="ques">
        <h2 class="text-center my-4">Student Room - Browse Categories</h2>
        <div class="row my-4">

            <?php 
         
         
          echo ' <div class="col-md-4 my-2">
                  <div class="card" style="width: 18rem;">
                  <img src="img/card.jpg" class="d-block w-100" alt="...">
                      <div class="card-body">
                          <h5 class="card-title"><a href="mocktest.php"</a>Mock Test</h5>
                          
                          <a href="mocktest.php" class="btn btn-primary">View Section</a>
                      </div>
                  </div>
                </div>

                <div class="col-md-4 my-2">
                  <div class="card" style="width: 18rem;">
                  <img src="img/card.jpg" class="d-block w-100" alt="...">
                      <div class="card-body">
                          <h5 class="card-title"><a href="questionbank.php"</a>Question Bank</h5>
                          
                          <a href="questionbank.php" class="btn btn-primary">View Section</a>
                      </div>
                  </div>
                </div>

                <div class="col-md-4 my-2">
                  <div class="card" style="width: 18rem;">
                  <img src="img/card.jpg" class="d-block w-100" alt="...">
                      <div class="card-body">
                          <h5 class="card-title"><a href="researchupdate.php"</a>Research Update</h5>
                         
                          <a href="researchupdate.php" class="btn btn-primary">View Section</a>
                      </div>
                  </div>
                </div>

                <div class="col-md-4 my-2">
                  <div class="card" style="width: 18rem;">
                  <img src="img/card.jpg" class="d-block w-100" alt="...">
                      <div class="card-body">
                          <h5 class="card-title"><a href="forum.php"</a>Discussion Forum</h5>
                          
                          <a href="forum.php" class="btn btn-primary">View Section</a>
                      </div>
                  </div>
                </div>

                <div class="col-md-4 my-2">
                  <div class="card" style="width: 18rem;">
                  <img src="img/card.jpg" class="d-block w-100" alt="...">
                      <div class="card-body">
                          <h5 class="card-title"><a href="simulation.php"</a>Simulations</h5>
                          
                          <a href="simulation.php" class="btn btn-primary">View Section</a>
                      </div>
                  </div>
                </div>'

                
                ;
        
         ?>
        </div>
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