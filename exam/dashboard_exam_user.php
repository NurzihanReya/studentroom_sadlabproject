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

    <title>Dashboard</title>
</head>

<body>
    <div class="row">
        <div class="col-lg-6 col-lg-push-3">
            <div class="mx-auto mt-3" style="width: 1500px;">
                <div class="content mt-3">
                    <div class="animated fadeIn">
                        <h4>Exam </h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="col-lg-6" style="float:left;">

                                            <div class="card">
                                                <div class="card-header"><strong>Add Questions</strong></div>
                                                <div class="card-body card-block">
                                                    <div class="form-group"><label for="newquestions"
                                                            class=" form-control-label">
                                                            Add Question</label><input type="text" id="newquestions"
                                                            placeholder="Add Question" class="form-control"
                                                            name="questions">
                                                    </div>
                                                    <div class="form-group"><label for="opt1"
                                                            class=" form-control-label">
                                                            Add Option 1</label><input type="text" id="opt1"
                                                            placeholder="Add Option 1" class="form-control" name="opt1">
                                                    </div>
                                                    <div class="form-group"><label for="opt2"
                                                            class=" form-control-label">
                                                            Add Option 2</label><input type="text" id="opt2"
                                                            placeholder="Add Option 2" class="form-control" name="opt2">
                                                    </div>
                                                    <div class="form-group"><label for="opt3"
                                                            class=" form-control-label">
                                                            Add Option 3</label><input type="text" id="opt3"
                                                            placeholder="Add Option 3" class="form-control" name="opt3">
                                                    </div>
                                                    <div class="form-group"><label for="opt4"
                                                            class=" form-control-label">
                                                            Add Option 4</label><input type="text" id="opt4"
                                                            placeholder="Add Option 4" class="form-control" name="opt4">
                                                    </div>
                                                    <div class="form-group"><label for="answer"
                                                            class=" form-control-label">
                                                            Add Answer</label><input type="text" id="answer"
                                                            placeholder="Add Answer" class="form-control" name="answer">
                                                    </div>
                                                    <div class="form-group"><input type="submit" name="submit1"
                                                            value="Submit" class="btn btn-success" style="float:right;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>