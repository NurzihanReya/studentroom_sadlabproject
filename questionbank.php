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

    <link rel="stylesheet" href="css/style.css">
    <title>Question Bank</title>
</head>

<body>
    <?php include 'partials/_nav.php'; ?>
    <form action="questionuploadform.php" method="POST">

        <div class="section">
            <div class="text">
                <h1>Question Bank</h1>
                <p><button type="submit" class="btn btn-primary">Upload</button><br><br>
                    <button type="submit" class="btn btn-primary">Questions</button><br><br>
                    <button type="submit" class="btn btn-primary">Request</button>
            </div>
            <img src="images/still-life-851328_960_720 1.png">
            </p>
        </div>
</body>

</html>