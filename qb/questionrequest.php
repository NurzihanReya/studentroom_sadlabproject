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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
    <title>Request For Question</title>
</head>

<body>


    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if(isset($_POST["Submit"])){
        // Insert into thread db
        $name = $_POST["name"];
        //echo $name;
        $term = $_POST["term"];
       
        $coursename = $_POST["coursename"];
        $trimester= $_POST["trimester"];
        //$sno = $_SESSION["sno"]; 
        $sql = "INSERT INTO `requests` (`name`,`term`, `coursename`, `trimester`) VALUES ('$name' ,'$term', '$coursename', '$trimester' )";
        $result = mysqli_query($conn, $sql);
        
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your request has been added! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>';
        } 
    }
    ?>
    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Question Request</h1>
            <p class="lead">Request Your question and get help.</p>
            <hr class="my-4">
            <!-- <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p> -->

        </div>
    </div>





    <div class="container">
        <h1 class="py-2">Question Request Form</h1>
        <form name="form1" action="" method="post">

            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                    placeholder="Name">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail2">Term</label>
                <input type="text" class="form-control" id="term" name="term" aria-describedby="emailHelp"
                    placeholder="Mid term/ Final term">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail3">Course Name</label>
                <input type="text" class="form-control" id="coursename" name="coursename" aria-describedby="emailHelp"
                    placeholder="Course Name">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail4">Trimester</label>
                <input type="text" class="form-control" id="trimester" name="trimester" aria-describedby="emailHelp"
                    placeholder="Ex: Summer-2022">

            </div>

            <div class="form-group">
                <input type="submit" name="Submit" value="submit">
            </div>
        </form>
    </div>






    <div class="container mb-5" id="ques">
        <h1 class="py-2">Requests</h1>
        <?php
    //$id = $_GET['catid'];
    $sql = "SELECT * FROM `requests`"; 
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $request_no = $row["request_no"];
        $name = $row["name"];
        $term = $row["term"];
        $coursename = $row["coursename"]; 
        $trimester = $row["trimester"];
        //$thread_time = $row['timestamp']; 
        //$request_user_id = $row["request_user_id"];
        //$status = $row['status'];
        
        
        // $sql2 = "SELECT name FROM `users` WHERE sno='$request_user_id'";
        // $result2 = mysqli_query($conn, $sql2);
        // $row2 = mysqli_fetch_assoc($result2);
        



        echo '<div class="media my-3">
            <img src="images/ques3.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">'.
             '<h5 class="mt-0"> <a class="text-dark" href="requests.php?requestno=' . $request_no . '">'. $coursename . ' </a></h5>
             Need '. $term . ' question for '. $coursename . ' of '. $trimester . ' </div>'.'<div class="font-weight-bold my-0"> Asked by: '. $name . ' </div>'.
        '</div>';

        }
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Requests Found</p>
                        <p class="lead"> Be the first person to request a question</p>
                    </div>
                 </div> ';
        }
    ?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>