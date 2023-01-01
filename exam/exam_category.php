<?php
session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
header("location: login.php");
exit;
}
?>

<?php include "header.php" ?>


<div class="mx-auto mt-3" style="width: 1500px;">

    <div class="content mt-3">
        <div class="animated fadeIn">
            <h4>Add Exam Categories</h4>


            <div class="row">
                <div class=" col-lg-6 " style="float:left;">
                    <div class=" card">
                        <form name="form1" action="" method="POST">
                            <div class="card-body">


                                <div class="card">
                                    <div class="card-header"><strong>Add Exam Categories</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="examtime" class=" form-control-label">Course
                                                Name </label><input type="text" id="examtime"
                                                placeholder="Enter Course Name" class="form-control" name="courseid">
                                        </div>
                                        <div class="form-group"><label for="newexamcategory"
                                                class=" form-control-label">Topic
                                                Name</label><input type="text" id="newexamcategory"
                                                placeholder="Enter Topic Name" class="form-control" name="examname">
                                        </div>
                                        <div class="form-group"><label for="examtime" class=" form-control-label">Exam
                                                Time </label><input type="text" id="examtime"
                                                placeholder="Enter Total Exam Time In Minutes" class="form-control"
                                                name="examtime">
                                        </div>
                                        <div class="form-group"><input type="submit" name="submit1" value="Add Exam"
                                                class="btn btn-success" style="float:right;">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="col-lg-12 my-4" style="float:left;">
                    <div class="card">
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
                                                    <th scope="col">Course Name</th>
                                                    <th scope="col">Topic Name</th>
                                                    <th scope="col">Exam Time</th>
                                                    <th scope="col">Edit</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 0;
                                                $res = mysqli_query($conn, "select * from exam_category");
                                                while($row=mysqli_fetch_array($res))
                                                {
                                                    $count = $count+1;
                                                    ?>
                                                <tr>
                                                    <th scope="row"><?php echo $count; ?> </th>
                                                    <td><?php echo $row["subject_name"]; ?> </td>
                                                    <td><?php echo $row["exam_category_name"]; ?> </td>
                                                    <td><?php echo $row["exam_time_in_min"]; ?> </td>
                                                    <td><a
                                                            href="edit_exam.php?id= <?php echo $row["exam_category_id"]; ?> ">
                                                            Edit </a></td>
                                                    <td><a href="
                                                            delete.php?id=<?php echo $row["exam_category_id"]; ?> ">Delete<a>
                                                    </td>
                                                </tr>

                                                <?php
                                                }?>



                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                    </div>
                    </form>
                </div>



                <!--/.col-->
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div>

<?php
if(isset($_POST["submit1"]))
{
    $courseid = $_POST["courseid"];
    $examname = $_POST["examname"];
    $examtime = $_POST["examtime"]; 

    $sql = "INSERT INTO `exam_category` (`subject_name`,`exam_category_name`, `exam_time_in_min`) VALUES ('$courseid','$examname', '$examtime')";
 
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    echo ("<script LANGUAGE='JavaScript'>
window.alert('Exam added successfully!');
window.location.href = 'http://localhost/studentroom/exam/exam_category.php';
</script>");
}

?>
<?php

?>




<?php include "footer.php" ; ?>