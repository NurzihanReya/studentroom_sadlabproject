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
    $ques_id = $_GET["id"];
    $ques_category = $_GET["id1"];
    $ques = "";
    $opt1 = "";
    $opt2 = "";
    $opt3 = "";
    $opt4 = "";
    $ans = "";
    $res = mysqli_query($conn, "select * from exam_questions where ques_id = '$ques_id'");
    while($row=mysqli_fetch_array($res))
    {
        $ques = $row["ques_desc"];
        $opt1 = $row["opt1"];
        $opt2 = $row["opt2"];
        $opt3 = $row["opt3"];
        $opt4 = $row["opt4"];
        $ans = $row["answer"];
    }
?>



<div class="container">
    <div class="content mt-3">
        <div class="animated fadeIn">

            <h4>Edit Questions</h4>
            <div class="row mb-4">
                <div class="col-lg-12">
                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header"><strong>Edit Questions</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="newquestions" class=" form-control-label">
                                        Update Question</label><input type="text" id="newquestions"
                                        placeholder="Update Question" class="form-control" name="questions"
                                        value=" <?php echo $ques ; ?>" required>
                                </div>
                                <div class="form-group"><label for="opt1" class=" form-control-label">
                                        Update Option 1</label><input type="text" id="opt1"
                                        placeholder="Update Option 1" class="form-control" name="opt1"
                                        value=" <?php echo $opt1 ; ?>" required>
                                </div>
                                <div class="form-group"><label for="opt2" class=" form-control-label">
                                        Update Option 2</label><input type="text" id="opt2"
                                        placeholder="Update Option 2" class="form-control" name="opt2"
                                        value=" <?php echo $opt2 ; ?>" required>
                                </div>
                                <div class="form-group"><label for="opt3" class=" form-control-label">
                                        Update Option 3</label><input type="text" id="opt3"
                                        placeholder="Update Option 3" class="form-control" name="opt3"
                                        value=" <?php echo $opt3 ; ?>" required>
                                </div>
                                <div class="form-group"><label for="opt4" class=" form-control-label">
                                        Update Option 4</label><input type="text" id="opt4"
                                        placeholder="Update Option 4" class="form-control" name="opt4"
                                        value=" <?php echo $opt4 ; ?>" required>
                                </div>
                                <div class="form-group"><label for="answer" class=" form-control-label">
                                        Update Answer</label><input type="text" id="answer" placeholder="Update Answer"
                                        class="form-control" name="answer" value=" <?php echo $ans ; ?>" required>
                                </div>
                                <div class="form-group"><input type="submit" name="submit1" value="Update"
                                        class="btn btn-success" style="float:right;">
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

<?php
    if(isset($_POST["submit1"]))
    {
        mysqli_query($conn, "update exam_questions set ques_desc='$_POST[questions]', opt1= '$_POST[opt1]', opt2= '$_POST[opt2]', 
        opt3= '$_POST[opt3]', opt4= '$_POST[opt4]', answer= '$_POST[answer]'  where ques_id = '$ques_id'    "); 
    ?>

<script LANGUAGE='JavaScript'>
window.alert('Question updated successfully!');
window.location.href = "add_edit_after_select_exam.php?id=<?php echo $ques_category?>"
</script>
<?php
    }

?>

<?php include "footer.php" ; ?>