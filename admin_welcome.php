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

    <?php
        if($_SESSION['user_type_id'] == 1)
        {
            $sql = "SELECT * FROM `threads` WHERE status = 0"; 
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            $number = 0;
            while($row = mysqli_fetch_assoc($result))
            {
                $noResult = false;
                $id = $row['thread_id'];
                $title = $row['thread_title'];
                $desc = $row['thread_desc']; 
                $thread_time = $row['timestamp']; 
                $thread_user_id = $row['thread_user_id'];
                $status = $row['status'];
                $number = $number+1;
            }
                if($number>0)
                {
                echo'
                <div class="alert alert-primary alert-dismissible fade show my-0" role="alert">
                    <p>You have <b>'. $number.'</b> post requests you need to approve. Visit <a href="profile.php" class="alert-link">your profile</a> to approve or decline.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                }
            
        }

    ?>


    <!-- Slider starts here 
    <h4 class="alert-heading">Welcome admin - <?php echo $_SESSION['username']?></h4>  -->


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
        <div class="row">

            <?php 
         
         
          echo '
          <div class="col-md-4 my-2">
          <div class="card" style="width: 18rem;">
          
              <div class="card-body">
              <img src="img/6134172.jpg" class="d-block w-100" alt="...">
                  <h5 class="card-title"><a href="forum.php">Discussion Forum</a></h5>
                  <p>Discuss your study related concerns here.</p>
                  <a href="forum.php" class="btn btn-primary">View Section</a>
              </div>
          </div>
        </div>
         
          
          <div class="col-md-4 my-2">
          <div class="card" style="width: 18rem;">
         
              <div class="card-body">
              <img src="img/3659166.jpg" class="d-block w-100" alt="...">
                  <h5 class="card-title"><a href="http://localhost/studentroom/exam/exam_category.php">Mock Test</a></h5>
                  <p>Perform a mock test and review your answers.</p>
                  <a href="http://localhost/studentroom/exam/exam_category.php" class="btn btn-primary">View Section</a>
              </div>
          </div>
        </div>

        <div class="col-md-4 my-2">
          <div class="card" style="width: 18rem;">
         
              <div class="card-body">
                <img src="img/card.jpg" class="d-block w-100" alt="...">
                  <h5 class="card-title"><a href="qb/questionbank.php">Question Bank</a></h5>
                  <p>Solve previous questions and take a better preparation.</p>
                  <a href="qb/questionbank.php" class="btn btn-primary">View Section</a>
              </div>
          </div>
        </div>

        <div class="col-md-4 my-2">
          <div class="card" style="width: 18rem;">
          
              <div class="card-body">
              <img src="img/6567453a.jpg" class="d-block w-100" alt="...">
                  <h5 class="card-title"><a href="r_profiles1.php">Research Update</a></h5>
                  <p>See the latest researches of UIU and plan yours.</p>
                  <a href="r_profiles1.php" class="btn btn-primary">View Section</a>
              </div>
          </div>
        </div>

        

        <div class="col-md-4 my-2">
          <div class="card" style="width: 18rem;">
             
              <div class="card-body">
              <img src="img/5437683.jpg" class="d-block w-100" alt="...">
                  <h5 class="card-title"><a href="hp_simulation.php">Simulations</a></h5>
                  <p>Have a better understanding of algorithms by simulations.</p>
                  <a href="hp_simulation.php" class="btn btn-primary">View Section</a>
              </div>
          </div>
        </div>'

                
                ;
        
         ?>
        </div>
    </div>


    <!-- Optional JavaScript
 <img src="img/3659166.jpg" class="d-block w-100" alt="...">
 <img src="img/card.jpg" class="d-block w-100" alt="...">
<img src="img/6567453a.jpg" class="d-block w-100" alt="...">
<img src="img/5437683.jpg" class="d-block w-100" alt="...">
 <img src="img/6134172.jpg" class="d-block w-100" alt="...">



-->
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