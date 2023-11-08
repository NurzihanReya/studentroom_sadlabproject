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

    <title>Exams</title>
</head>

<body>

    <div class="container my-4 ">
        <div class="jumbotron">
            <h1 class="display-4">Welcome To Mock Test Section</h1>
            <p class="lead">Take better preparations for your exams</p>
            <hr class="my-4">
            <p>Perform test within time limit from here. To verify your own questions and answers, go to the upload
                question section. Help others by evaluating their results by becoming an evaluator.</p>
            <p class="lead">
                <a class="btn btn-outline-primary btn-lg" href="mocktest_uploadques.php" role="button">Upload Your Own
                    Question</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-success btn-lg" data-toggle="modal"
                    data-target="#exampleModal">
                    Become An Evaluator
                </button>

                <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Become An Evaluator</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="post">
                                <div class="form-group">
                                    <label for="id">ID</label>
                                    <input type="text" class="form-control" id="" aria-describedby="emailHelp"
                                        placeholder="Enter your university ID">

                                    <label for="trimester">Trimester</label>
                                    <input type="text" class="form-control" id="" aria-describedby="emailHelp"
                                        placeholder="Enter your Trimester">

                                    <label for="cgpa">CGPA</label>
                                    <input type="text" class="form-control" id="" aria-describedby="emailHelp"
                                        placeholder="Enter CGPA">

                                    <label for="selected_course">Select Course</label>
                                    <select class="form-control" id='select_course'>
                                        <option value="0">- Select -</option>

                                        <?php
                                            $sql = "SELECT * FROM `exam_courses`";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                                $id = $row['id'];
                                                $name = $row['course_name'];

                                                echo"
                                                <option value='".$id."' > ". $name ."</option> ";
                                            }
                                            
                                            
                                            ?>

                                    </select>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="exam.php" class="btn btn-primary">Submit</a>


                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){

       
            $id = $_POST["id"];
            $cgpa = $_POST["cgpa"];
            $trimester = $_POST["trimester"];
            $selected_course = $_POST["selected_course"];
            $status = 1;

            $sql4 = "INSERT INTO `evaluators` (`id`, `cgpa`, `trimester`, `selected_course`, `status`) VALUES ('$id',
            '$cgpa', '$trimester', $selected_course, '$status')";
            $result = mysqli_query($conn, $sql4);
            if ($result)
            {
            $showAlert = true;
            }
            }

            ?>
            <?php
    if($showAlert){
    
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your application has been submitted.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    }
?>

            </p>
        </div>
    </div>

    <div class="container my-4 ">
        <h3>Get Ready To perfrom A Test</h3>
        <form>

            <div class="form-group">
                <label for="exampleInputEmail1">Select Course</label>
                <select class="form-control" id='select_course'>
                    <option value="0">- Select -</option>

                    <?php
                    $sql = "SELECT * FROM `exam_courses`";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $name = $row['course_name'];

                        echo"
                        <option value='".$id."' > ". $name ."</option> ";
                    }
                    $id = $_GET['id'];
                    
                    
                    ?>
                    <div class="clear"></div>
                </select>

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Select Topic</label>

                <select class="form-control" id='select_topic' onchange="javascript:handleSelect(this)">
                    <!-- static -->
                    <option value="0">- Select -</option>
                    <option value="linkedlist">LinkedList</a></option>
                    <option value="sp">Shortest Path Algorithms</option>

                </select>


                <script type="text/javascript">
                document.getElementById('select_topic').addEventListener('change', function() {
                    val = $("#select_topic").val();

                    console.log(val)
                    if (val === 'linkedlist') {
                        window.location.replace('linkedlist.php', '_blank');
                    }
                    if (val === 'sp') {
                        window.location.replace('sp.php', '_blank');
                    }

                });
                </script>
            </div>
            <!-- static  <button type="submit" class="btn btn-primary">Submit</button>      -->
        </form>
    </div>













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