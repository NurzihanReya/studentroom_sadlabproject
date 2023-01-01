<?php
session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="sass/main.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <title>Merge Sort Simulation</title>
</head>

<body>
    <?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/studentroom/partials/_nav.php";
    include_once($path);
    ?>
    <div class="container my-5">
        <div id="settings">
            <div class="menu-header">
                <div id="close-menu">
                    <i class="fas fa-times"></i>
                </div>
                <h2>Settings</h2>
            </div>

            <div class="settings-container">
                <div>
                    <p>Array:</p>
                    <input id="arr" type="text" placeholder="[0, 1, 2, 3, 4, ...] - Minimum length: 2" />
                </div>

                <div>
                    <p>Time:</p>
                    <input id="timeout" type="number" placeholder="Miliseconds" />
                </div>

                <div class="errors">
                    <p id="settings-error"></p>
                </div>

                <div class="success">
                    <p id="success"></p>
                </div>

                <button id="save-settings">Save</button>
            </div>
        </div>

        <header>
            <div class="header-container">
                <div id="settings-btn">
                    <i class="fas fa-bars"></i>
                </div>

                <div>
                    <h1><u>Merge Sort Simulation</u></h1>
                </div>
            </div>
            <div class="gradient-border"></div>
        </header>

        </p>
        <div class="collapse show" id="collapseExample" style="">
            <div class="card card-body">
                <p>
                    The Merge Sort algorithm is a sorting algorithm that is based on the
                    Divide and Conquer paradigm. In this algorithm, the array is initially
                    divided into two equal halves and then they are combined in a sorted
                    manner.
                <h3>Merge Sort Working Process:</h3>
                Think of it as a recursive algorithm continuously splits the array in
                half until it cannot be further divided. This means that if the array
                becomes empty or has only one element left, the dividing will stop, i.e.
                it is the base case to stop the recursion. If the array has multiple
                elements, split the array into halves and recursively invoke the merge
                sort on each of the halves. Finally, when both halves are sorted, the
                merge operation is applied. Merge operation is the process of taking two
                smaller sorted arrays and combining them to eventually make a larger
                one.<br><br><br>
                </p>
            </div>
        </div>
        <br><br>

        <main>
            <section class="animation-zone"></section>

            <section class="errors">
                <p class="error-msg"></p>
            </section>

            <section class="buttons">
                <div class="wrapper">
                    <button id="sort">Sort</button>
                </div>
            </section>

        </main>

        <script src="vendor/fontawesome/fontawesome.js"></script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/arrays.js"></script>
        <script src="js/main.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/animation.js"></script>
    </div>

</body>

</html>