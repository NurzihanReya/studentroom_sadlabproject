<?php
session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
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

    <title>Select Exam</title>
</head>

<body>

    <?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/studentroom/partials/_dbconnect.php";
    include_once($path);
    ?>
    <?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/studentroom/partials/nav_exam.php";
    include_once($path);
    ?>



    <div class="container">
        <h2 class="text-center my-4">Student Room - Exam Categories</h2>

        <?php
                                                $count = 0;
                                                $res = mysqli_query($conn, "select * from exam_category");
                                                while($row=mysqli_fetch_array($res))
                                                {
                                                    ?>

        <div class="card text-center my-4 " style="width: 1200px;">
            <div class=" card-header">
                <?php echo $row["courseid"]; ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["exam_category_name"]; ?></h5>
                <p class="card-text"> Exam Time: <?php echo $row["exam_time_in_min"]; ?> Minutes
                </p>
                <a class="btn btn-primary"
                    href="show_ques1.php?id= <?php echo $row["exam_category_id"]; ?>&id1=<?php echo $row["exam_time_in_min"]; ?>">
                    Start Exam </a>
            </div>
        </div>
        <?php
                } ?>

    </div>


    <!--  start exam er bodole show ques file disi
     <div class="mx-auto mt-3" style="width: 1500px;">

        <div class="content mt-3">
            <div class="animated fadeIn">
                <h4>Exam Categories</h4>


                <div class="row">
                    <div class="col-lg-12">

                        <form name="form1" action="" method="POST">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Exam Categories</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Exam Name</th>
                                                    <th scope="col">Exam Time</th>
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                //$count = 0;
                                                /* $res = mysqli_query($conn, "select * from exam_category");
                                                while($row=mysqli_fetch_array($res))
                                                {
                                                    $count = $count+1;
                                                    ?> 
                                                <tr>
                                                    <th scope="row"><?php echo $count; ?> </th>
                                                    <td><?php echo $row["exam_category_name"]; ?> </td>
                                                    <td><?php echo $row["exam_time_in_min"]; ?> </td>
                                                    <td><a
                                                            href="start_exam.php?id= <?php echo $row["exam_category_id"]; ?>&id1=<?php echo $row["exam_time_in_min"]; ?>">
                                                            Start Exam </a></td>

                                                </tr>

                                                <?php
                                                } */ ?> 



                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                    </div>
                    </form>



    <!--/.col-->
    </div>
    </div><!-- .animated -->
    </div><!-- .content -->
    </div>


    -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>