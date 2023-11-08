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
<?php
$showAlert = false;
$showError = false;

if(isset($_POST['submit'])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];  
    $id = $_POST["id"];
    $departmentname  = $_POST["departmentname"];
    $coursenameandcode = $_POST["coursenameandcode"];
    $question = $_FILES['question']['name'];
    $tmpname = $_FILES['question']['tmp_name'];
    $uploc = 'questions/' . $question;

    $sql="INSERT INTO `uploads` (`name`, `email`, `id`,`departmentname`,`coursenameandcode`,`question`, `dt`) VALUES ('$name', '$email', '$id','$departmentname','$coursenameandcode','$question', current_timestamp())";

    if(mysqli_query($conn,$sql)==TRUE){
        move_uploaded_file($tmpname, $uploc);
        $showAlert = TRUE;
        
    }
    else{
        $showError;
    }
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

    <title>Question Upload Form</title>
</head>

<body>


    <?php
    if($showAlert){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success! Your question has been uploaded.');
    window.location.href='questionbank.php';
    </script>");
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
        <h1 class="text-center">Form To Upload Question</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name"></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="username"></label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                    placeholder="Email">
            </div>
            <div class="form-group">
                <label for="text"></label>
                <input type="text" class="form-control" id="id" name="id" placeholder="ID">
            </div>
            <div class="form-group">
                <label for="text"></label>
                <input type="text" class="form-control" id="departmentname" name="departmentname"
                    placeholder="Department name">
            </div>
            <div class="form-group">
                <label for="text"></label>
                <input type="text" class="form-control" id="coursenameandcode" name="coursenameandcode"
                    placeholder="Course Name and Code">
            </div>
            <div class="form-group">
                <label for="file"></label>
                <input type="file" class="form-control" id="question" name="question" placeholder="File">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>
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