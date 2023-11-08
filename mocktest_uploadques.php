<?php
if(!isset($_SESSION)) session_start();

//session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
$showAlert = false;
?>


<?php include 'partials/_dbconnect.php'; ?>
<?php include 'partials/_nav.php'; ?>
<!doctype html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Upload Your Question and Answer</title>
</head>

<body>
    <?php
    if(isset($_POST['submit'])){
    include 'partials/_dbconnect.php';
    $name = $_SESSION["name"];
    $email = $_SESSION["username"];
    $id = $_SESSION["sno"];
    $course = $_POST["course"];
    $question = $_FILES['question']['name'];
    $tmpname_ques = $_FILES['question']['tmp_name'];
    
    $uploc_ques = 'mocktest/question' . $question;
    $answer = $_FILES['answer']['name'];
    $tmpname_ans = $_FILES['answer']['tmp_name'];
    $uploc_ans = 'mocktest/answer';

    $sql="INSERT INTO `mocktest_uploads` (`name`, `email`, `id`,`course`,`question`,`answer`,  `dt`) VALUES
    ('$name', '$email', '$id','$course','$question','$answer', current_timestamp())";

    if(mysqli_query($conn,$sql)==TRUE){
    move_uploaded_file($tmpname_ques, $uploc_ques);
    move_uploaded_file($tmpname_ans, $uploc_ans);
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

        <title>Exams</title>
    </head>

    <body>

        <?php
    if($showAlert){


    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success! Your question and answer has been uploaded.');
    window.location.href='exam.php';
    </script>");
    }
    
    ?>

        <div class="container my-4">
            <h1 class="text-center">Form To Upload Question</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">


                <div class="form-group">
                    <label for="text">Course</label>
                    <input type="text" class="form-control" id="course" name="course" placeholder="Course Name">

                </div>
                <div class=" form-group">
                    <label for="file">Upload Your Question</label>
                    <input type="file" class="form-control" id="question" name="question" placeholder="File">
                </div>
                <div class="form-group">
                    <label for="file">Upload Your Answer</label>
                    <input type="file" class="form-control" id="question" name="answer" placeholder="File">
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