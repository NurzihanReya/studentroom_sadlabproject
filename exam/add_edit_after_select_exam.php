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
$exam_category_id = $_GET['id'];
$exam_category = '';
$res = mysqli_query($conn, "select * from exam_category where exam_category_id = '$exam_category_id' "); //s
while($row = mysqli_fetch_array($res))
{
    $exam_category = $row["exam_category_name"];
}
?>


<div class="mx-auto mt-3" style="width: 1500px;">
    <div class="content mt-3">
        <div class="animated fadeIn">
            <h4>Add Questions In Exam Category - <?php echo $exam_category ; ?> </h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <div class="col-lg-6" style="float:left;">

                                    <div class="card">
                                        <div class="card-header"><strong>Add Questions</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="newquestions"
                                                    class=" form-control-label">
                                                    Add Question</label><input type="text" id="newquestions"
                                                    placeholder="Add Question" class="form-control" name="questions"
                                                    required>
                                            </div>
                                            <div class="form-group"><label for="opt1" class=" form-control-label">
                                                    Add Option 1</label><input type="text" id="opt1"
                                                    placeholder="Add Option 1" class="form-control" name="opt1"
                                                    required>
                                            </div>
                                            <div class="form-group"><label for="opt2" class=" form-control-label">
                                                    Add Option 2</label><input type="text" id="opt2"
                                                    placeholder="Add Option 2" class="form-control" name="opt2"
                                                    required>
                                            </div>
                                            <div class="form-group"><label for="opt3" class=" form-control-label">
                                                    Add Option 3</label><input type="text" id="opt3"
                                                    placeholder="Add Option 3" class="form-control" name="opt3"
                                                    required>
                                            </div>
                                            <div class="form-group"><label for="opt4" class=" form-control-label">
                                                    Add Option 4</label><input type="text" id="opt4"
                                                    placeholder="Add Option 4" class="form-control" name="opt4"
                                                    required>
                                            </div>
                                            <div class="form-group"><label for="answer" class=" form-control-label">
                                                    Add Correct Option Number</label><input type="text" id="answer"
                                                    placeholder="Add Correct Option Number" class="form-control"
                                                    name="answer" required>
                                            </div>
                                            <div class="form-group"><input type="submit" name="submit1" value="Submit"
                                                    class="btn btn-success" style="float:right;">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <!-- image portion -->
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <div class="col-lg-6" style="float:right;">

                                    <div class="card">
                                        <div class="card-header"><strong>Add Question With Images</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group"><label for="newquestions"
                                                    class=" form-control-label">
                                                    Add Question</label><input type="text" id="newquestions"
                                                    placeholder="Add Question" class="form-control" name="fquestions"
                                                    required>
                                            </div>
                                            <div class="form-group"><label for="fopt1" class=" form-control-label">
                                                    Add Option 1</label><input type="file" id="fopt1"
                                                    class="form-control" style="padding-bottom: 36px" name="fopt1"
                                                    required>
                                            </div>
                                            <div class="form-group"><label for="fopt2" class=" form-control-label">
                                                    Add Option 2</label><input type="file" id="fopt2"
                                                    class="form-control" style="padding-bottom: 36px" name="fopt2"
                                                    required>
                                            </div>
                                            <div class="form-group"><label for="fopt3" class=" form-control-label">
                                                    Add Option 3</label><input type="file" id="fopt3"
                                                    class="form-control" style="padding-bottom: 36px" name="fopt3"
                                                    required>
                                            </div>
                                            <div class="form-group"><label for="fopt4" class=" form-control-label">
                                                    Add Option 4</label><input type="file" id="fopt4"
                                                    class="form-control" style="padding-bottom: 36px" name="fopt4"
                                                    required>
                                            </div>
                                            <div class="form-group"><label for="fanswer" class=" form-control-label">
                                                    Add Correct Option Number</label> <input type="text" id="fanswer"
                                                    class="form-control" placeholder="Add Correct Option Number"
                                                    name="fanswer" required>
                                            </div>
                                            <div class="form-group"><input type="submit" name="submit2" value="Submit"
                                                    class="btn btn-success" style="float:right;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>




                </div>
                <!--/.col-->
            </div>

            <div class="row mt-4 mb-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>

                                    <th>Question</th>
                                    <th>Option 1</th>
                                    <th>Option 2</th>
                                    <th>Option 3</th>
                                    <th>Option 4</th>
                                    <th>Answer</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>

                                <?php

                        $res = mysqli_query($conn, "select * from exam_questions where category = '$exam_category' order by ques_id asc");
                        while($row=mysqli_fetch_array($res))
                        {
                            echo "<tr>";
                            
                            echo "<td>"; echo $row['ques_desc'];  echo "</td>";
                            echo "<td>"; 

                            if(strpos($row['opt1'], 'opt_images/') !== FALSE) //chobi ase
                            {
                                ?>
                                <img src="<?php echo $row['opt1']; ?>" height="150" width="200">
                                <?php
                            }
                            else
                            {
                                echo $row['opt1'];
                            }
                            echo "</td>";
                            echo "<td>"; 
                            if(strpos($row['opt2'], 'opt_images/') !== FALSE) //chobi ase
                            {
                                ?>
                                <img src="<?php echo $row['opt2']; ?>" height="150" width="200">
                                <?php
                            }
                            else
                            {
                                echo $row['opt2'];
                            }
                            echo "</td>";
                            echo "<td>"; 
                            if(strpos($row['opt3'], 'opt_images/') !== FALSE) //chobi ase
                            {
                                ?>
                                <img src="<?php echo $row['opt3']; ?>" height="150" width="200">
                                <?php
                            }
                            else
                            {
                                echo $row['opt3'];
                            }
                            echo "</td>";
                            echo "<td>"; 
                            if(strpos($row['opt4'], 'opt_images/') !== FALSE) //chobi ase
                            {
                                ?>
                                <img src="<?php echo $row['opt4']; ?>" height="150" width="200">
                                <?php
                            }
                            else
                            {
                                echo $row['opt4'];
                            }
                            echo "</td>";

                            echo "<td>"; 
                            if(strpos($row['answer'], 'opt_images/') !== FALSE) //chobi ase
                            {
                                ?>
                                <img src="<?php echo $row['answer']; ?>" height="150" width="200">
                                <?php
                            }
                            else
                            {
                                echo $row['answer'];
                            }
                            echo "</td>";

                            echo "<td>";
                            if(strpos($row['opt4'], 'opt_images/') !== FALSE) //chobi ase
                            {
                                ?>
                                <a
                                    href="edit_option_images.php?id=<?php echo $row['ques_id']; ?>&id1=<?php echo $exam_category_id; ?>">Edit</a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a
                                    href="edit_option.php?id=<?php echo $row['ques_id']; ?>&id1=<?php echo $exam_category_id; ?>">Edit</a>
                                <?php
                            }
                            echo "</td>";

                            echo "<td>";
                            ?>
                                <a
                                    href="delete_option.php?id=<?php echo $row['ques_id']; ?>&id1=<?php echo $exam_category_id; ?>">Delete</a>
                                <?php
                            echo "</td>";

                            }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- .animated -->
</div><!-- .content -->

<?php
if(isset($_POST["submit1"]))
{
    $loop = 0;
    $count = 0;

    $res = mysqli_query($conn, "select * from exam_questions where category=' $exam_category' order by ques_id asc") or die(mysqli_error($conn));

    $count = mysqli_num_rows($res);
    if($count == 0)
    {

    }
    else
    {
        while($row = mysqli_fetch_array($res))
        {
            $loop = $loop+1;
            mysqli_query($conn, "UPDATE `exam_questions` SET `ques_no` = '$loop' WHERE `exam_questions`.`ques_id` = $row[ques_id];"); //update hoitese na
            
        }
        
    }$loop = $loop+1;
    

    mysqli_query($conn, "insert into exam_questions values (NULL, '$_POST[questions]', '$_POST[opt1]', '$_POST[opt2]', '$_POST[opt3]', '$_POST[opt4]', '$_POST[answer]', '$exam_category')") or die(mysqli_error($conn));
    ?>
<script LANGUAGE='JavaScript'>
window.alert('Question added successfully!');
window.location.href = "add_edit_after_select_exam.php?id=<?php echo $exam_category_id?>";
</script>
<?php
}
?>



<?php
//for file ques
if(isset($_POST["submit2"]))
{
    $loop = 0;
    $count = 0;

    $res = mysqli_query($conn, "select * from exam_questions where category=' $exam_category' order by ques_id asc") or die(mysqli_error($conn));

    $count = mysqli_num_rows($res);
    if($count == 0)
    {

    }
    else
    {
        while($row = mysqli_fetch_array($res))
        {
            $loop = $loop+1;
            mysqli_query($conn, "update exam_questions set ques_no = '$loop' where ques_id=$row[ques_id]");
        }
    }
    $loop = $loop+1;
    $tm = md5(time());
    
    $fnm1 = $_FILES["fopt1"]["name"]; 
    $dst1 = "./opt_images/" . $fnm1;  //for uploading image
    $dst_db1 = "opt_images/" . $fnm1; //for storing in db
    move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);

    $fnm2 = $_FILES["fopt2"]["name"]; 
    $dst2 = "./opt_images/" . $fnm2;  //for uploading image
    $dst_db2 = "opt_images/" . $fnm2; //for storing in db
    move_uploaded_file($_FILES["fopt2"]["tmp_name"], $dst2);

    $fnm3 = $_FILES["fopt3"]["name"]; 
    $dst3 = "./opt_images/" . $fnm3;  //for uploading image
    $dst_db3 = "opt_images/" . $fnm3; //for storing in db
    move_uploaded_file($_FILES["fopt3"]["tmp_name"], $dst3);

    $fnm4 = $_FILES["fopt4"]["name"]; 
    $dst4 = "./opt_images/" . $fnm4;  //for uploading image
    $dst_db4 = "opt_images/" . $fnm4; //for storing in db
    move_uploaded_file($_FILES["fopt4"]["tmp_name"], $dst4);




    mysqli_query($conn, "insert into exam_questions values (NULL, '$_POST[fquestions]', '$dst_db1', '$dst_db2', '$dst_db3', '$dst_db4', '$_POST[fanswer]', '$exam_category')") or die(mysqli_error($conn));

    ?>
<script LANGUAGE='JavaScript'>
window.alert('Question added successfully!');
window.location.href = "add_edit_after_select_exam.php?id=<?php echo $exam_category_id?>";
</script>
<?php
    }
    ?>



<?php include "footer.php" ;
//window.location.href = 'http://localhost/studentroom/exam/add_edit_after_select_exam.php?id=" . $exam_category_id . "; ?>