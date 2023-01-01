<?php
session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
header("location: login.php");
exit;
}
?>

<?php include "header.php" ?>

<div class="container">

    <div class="content mt-3">
        <div class="animated fadeIn">
            <h4>Select Exam Categories for add and edit questions</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Course Name</th>
                                        <th scope="col">Topic Name</th>
                                        <th scope="col">Exam Time</th>
                                        <th scope="col">Action</th>
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
                                                href="add_edit_after_select_exam.php?id= <?php echo $row['exam_category_id']; ?> ">
                                                Select </a></td>

                                    </tr>

                                    <?php
                }?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/.col-->




    </div><!-- .animated -->
</div><!-- .content -->

</div>

<?php include "footer.php" ; ?>