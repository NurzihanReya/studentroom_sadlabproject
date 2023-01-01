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
    <title>CA</title>
</head>

<body>

    <div class="mx-auto my-4" style="width: 1500px;">

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Industrial & Production Engineering Questions</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" style="text-align: center;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Questions</th>
                                        <th scope="col">Term</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="col">1</th>
                                        <th scope="col">Fall 2021</th>
                                        <th scope="col">Final</th>
                                        <th scope="col"><a download="Term Final question,IPE 401, Fall 2021 - revised format.pdf" href="questionbank/Term Final question,IPE 401, Fall 2021 - revised format.pdf">Tap Here to Download</a></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>