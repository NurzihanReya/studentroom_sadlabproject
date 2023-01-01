<?php
session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
header("location: login.php");
exit;
}
?>

<?php include "header.php" // db ekhane ase?>


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



<!-- <br><img src="<?php echo $opt1; ?>" height="50" width="50"> -->
<div class="container">
    <div class="content mt-3">
        <div class="animated fadeIn">

            <h4>Edit Questions</h4>
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="col-lg-12">
                                <form name="form1" action="" method="post" enctype="multipart/form-data">

                                    <div class="card">
                                        <div class="card-header"><strong>Update Question With Images</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="newquestions"
                                                    class=" form-control-label">
                                                    Update Question</label><input type="text" id="newquestions"
                                                    placeholder="Update Question" class="form-control" name="fquestions"
                                                    value=" <?php echo $ques ; ?>">
                                            </div>
                                            <div class="form-group">

                                                <label for="opt1" class=" form-control-label">
                                                    Update Option 1</label><br><img src="<?php echo $opt1 ; ?>"
                                                    height="80" width="100"><br><input type="file" id="opt1"
                                                    class="form-control" style="padding-bottom: 36px" name="fopt1"
                                                    value=" <?php echo $opt1 ; ?>">
                                            </div>
                                            <div class="form-group"><label for="opt2" class=" form-control-label">
                                                    Update Option 2</label><br><img src="<?php echo $opt2 ; ?>"
                                                    height="80" width="100"><br><input type="file" id="fopt2"
                                                    class="form-control" style="padding-bottom: 36px" name="fopt2">
                                            </div>
                                            <div class="form-group"><label for="opt3" class=" form-control-label">
                                                    Update Option 3</label><br><img src="<?php echo $opt3 ; ?>"
                                                    height="80" width="100"><br><input type="file" id="fopt3"
                                                    class="form-control" style="padding-bottom: 36px" name="fopt3">
                                            </div>
                                            <div class="form-group"><label for="opt4" class=" form-control-label">
                                                    Update Option 4</label><br><img src="<?php echo $opt4 ; ?>"
                                                    height="80" width="100"><br><input type="file" id="fopt4"
                                                    class="form-control" style="padding-bottom: 36px" name="fopt4">
                                            </div>
                                            <div class="form-group"><label for="answer" class=" form-control-label">
                                                    Update Answer</label><br><img src="<?php echo $ans ; ?>" height="80"
                                                    width="100"><br><input type="file" id="fanswer" class="form-control"
                                                    style="padding-bottom: 36px" name="fanswer">
                                            </div>
                                            <div class="form-group"><input type="submit" name="submit2" value="Update"
                                                    class="btn btn-success" style="float:right;">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.col-->
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div>

<?php
    if(isset($_POST["submit2"]))
    {
        mysqli_query($conn, "update exam_questions set ques_desc='$_POST[fquestions]' where ques_id = '$ques_id'    "); 
        
        $fnm1 = $_FILES["fopt1"]["name"]; 

        if($fnm1 !="")
        {
            $dst1 = "./opt_images/" . $fnm1;  //for uploading image
            $dst_db1 = "opt_images/" . $fnm1; //for storing in db
            move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);

            mysqli_query($conn, "UPDATE `exam_questions` SET `opt1` = '$dst_db1' WHERE `exam_questions`.`ques_id` = '$ques_id' ");
        }

        $fnm2 = $_FILES["fopt2"]["name"]; 

        if($fnm2 !="")
        {
            $dst2 = "./opt_images/" . $fnm2;  //for uploading image
            $dst_db2 = "opt_images/" . $fnm2; //for storing in db
            move_uploaded_file($_FILES["fopt2"]["tmp_name"], $dst2);

            mysqli_query($conn, "UPDATE `exam_questions` SET `opt2` = '$dst_db2' WHERE `exam_questions`.`ques_id` = '$ques_id' ");
        }

        $fnm3 = $_FILES["fopt3"]["name"]; 

        if($fnm3 !="")
        {
            $dst3 = "./opt_images/" . $fnm3;  //for uploading image
            $dst_db3 = "opt_images/" . $fnm3; //for storing in db
            move_uploaded_file($_FILES["fopt3"]["tmp_name"], $dst3);

            mysqli_query($conn, "UPDATE `exam_questions` SET `opt3` = '$dst_db3' WHERE `exam_questions`.`ques_id` = '$ques_id' ");
        }

        $fnm4 = $_FILES["fopt4"]["name"]; 

        if($fnm4 !="")
        {
            $dst4 = "./opt_images/" . $fnm4;  //for uploading image
            $dst_db4 = "opt_images/" . $fnm4; //for storing in db
            move_uploaded_file($_FILES["fopt4"]["tmp_name"], $dst4);

            mysqli_query($conn, "UPDATE `exam_questions` SET `opt4` = '$dst_db4' WHERE `exam_questions`.`ques_id` = '$ques_id' ");
        }

        $fnm5 = $_FILES["fanswer"]["name"]; 
    
        if($fnm5 !="")
        {
            $dst5 = "./opt_images/" . $fnm5;  //for uploading image
            $dst_db5 = "opt_images/" . $fnm5; //for storing in db
            move_uploaded_file($_FILES["fanswer"]["tmp_name"], $dst5);

            mysqli_query($conn, "UPDATE `exam_questions` SET `answer` = '$dst_db5' WHERE `exam_questions`.`ques_id` = '$ques_id' ");
        }


         
    ?>

<script LANGUAGE='JavaScript'>
window.alert('Question updated successfully!');
window.location.href = "add_edit_after_select_exam.php?id=<?php echo $ques_category?>"
</script>
<?php
    }

?>

<?php include "footer.php" ; ?>