<?php
session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
header("location: login.php");
exit;
}
?>

<?php include "header.php" ?>

<?php
$exam_category_id = $_GET["id"];
$res = mysqli_query($conn, "select * from exam_category where exam_category_id = '$exam_category_id' ");

while($row = mysqli_fetch_array($res))
{
    
    $exam_category_name = $row["exam_category_name"];
    $course_name = $row["subject_name"];
    $exam_time_in_min = $row["exam_time_in_min"];
}
?>




<div class="container">

    <div class="content mt-3">
        <div class="animated fadeIn">
            <h4>Edit Exam Categories</h4>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form name="form1" action="" method="POST">
                            <div class="card-body">

                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header"><strong>Edit Exam Categories</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="newexamcategory"
                                                    class=" form-control-label">New Course Name </label><input
                                                    type="text" id="newexamcategory" class="form-control"
                                                    name="coursename" value="<?php echo $course_name ?>" required></div>
                                            <div class="form-group"><label for="newexamcategory"
                                                    class=" form-control-label">New
                                                    Exam Category </label><input type="text" id="newexamcategory"
                                                    class="form-control" name="examname"
                                                    value="<?php echo $exam_category_name ?>" required></div>
                                            <div class="form-group"><label for="examtime"
                                                    class=" form-control-label">Exam
                                                    Time In Minutes</label><input type="text" id="examtime"
                                                    class="form-control" name="examtime"
                                                    value="<?php echo $exam_time_in_min ?>" required>
                                            </div>
                                            <div class="form-group"><input type="submit" name="submit1"
                                                    value="Update Exam" class="btn btn-success" style="float:right;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
                <!--/.col-->
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div>

<?php
if(isset($_POST["submit1"]))
{
    $coursename = $_POST["coursename"];
    $examname = $_POST["examname"];
    $examtime = $_POST["examtime"]; 

    $sql1 = "UPDATE `exam_category` set exam_category_name = '$examname',subject_name = '$coursename', exam_time_in_min = '$examtime' where exam_category_id = '$_GET[id]' ";
 
    mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Exam category has been edited successfully!');
    window.location.href = 'http://localhost/studentroom/exam/exam_category.php';
    </script>");
    
}
?>



<?php include "footer.php" ; ?>