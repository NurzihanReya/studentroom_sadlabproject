<?php 
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
header("location: login.php");
exit;
}

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/studentroom/partials/_dbconnect.php";
    include_once($path);
    ?>
<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/studentroom/partials/nav_exam.php";
    include_once($path);
    ?>
<?php

$exam_category = $_GET["id"];
$exam_time = $_GET["id1"];
$res = mysqli_query($conn, "select * from exam_category where exam_category_id='$exam_category' ");
  
$row=mysqli_fetch_array($res);
$exam_category_name = $row['exam_category_name'];


$_SESSION['exam_category_name'] = $exam_category_name;
$exam_category_name = $_SESSION['exam_category_name'];
$exam_time = $exam_time * 60;

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

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <canvas id="mycanvas" width="250" height="250"></canvas>
    <div class="container ">
        <center>
            <div class="col-sm-2"></div>
            <div class="col-sm-8 my-4">


                <?php

    $res = mysqli_query($conn, "select * from exam_questions where category='$exam_category_name'  ");
    $i=1;
    while($row=mysqli_fetch_array($res))
            {
                $question_no = $row["ques_id"];
                $question = $row["ques_desc"];
                $opt1 = $row["opt1"];
                $opt2 = $row["opt2"];
                $opt3 = $row["opt3"];
                $opt4 = $row["opt4"];
            

            
            ?>
                <form method="post" id="form1" action="result.php">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="light">
                                <th><?php echo $i . ". ";?> <?php echo $question;?> </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(isset($opt1)){?>
                            <tr class="light">
                                <td>&nbsp;&emsp;
                                    <?php                                       //opt1
                
                                    if(strpos($opt1, 'opt_images/') !== FALSE)
                                    { 
                                        
                                        ?>
                                    <input type="radio" value="1"
                                        name="ques_no[<?php echo $question_no; ?>]">&nbsp;<?php echo ' <img src=" '.  $opt1 . ' " height="150" width="150"> ';?>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <input type="radio" value="1"
                                        name="ques_no[<?php echo $question_no; ?>]">&nbsp;<?php echo $opt1;?>

                                    <?php
                                        }
                                        ?>

                                </td>
                            </tr>
                            <?php }?>
                            <?php if(isset($opt2)){?>
                            <tr class="light">
                                <td>&nbsp;&emsp;
                                    <?php //opt2
                
                if(strpos($opt2, 'opt_images/') !== FALSE)
                { 
                ?>
                                    <input type="radio" value="2"
                                        name="ques_no[<?php echo $question_no; ?>]">&nbsp;<?php echo ' <img src=" '.  $opt2 . ' " height="150" width="150"> ';?>
                                    <?php
                }
                else
                {
                ?>
                                    <input type="radio" value="2"
                                        name="ques_no[<?php echo $question_no; ?>]">&nbsp;<?php echo $opt2;?>

                                    <?php
                    }
                    ?>
                                </td>
                            </tr>
                            <?php }?>
                            <?php if(isset($opt3)){?>
                            <tr class="light">
                                <td>&nbsp;&emsp;
                                    <?php //opt3
                
                if(strpos($opt3, 'opt_images/') !== FALSE)
                { 
                    
                    ?>
                                    <input type="radio" value="3"
                                        name="ques_no[<?php echo $question_no; ?>]">&nbsp;<?php echo ' <img src=" '.  $opt3 . ' " height="150" width="150"> ';?>
                                    <?php
                }
                else
                {
                ?>
                                    <input type="radio" value="3"
                                        name="ques_no[<?php echo $question_no; ?>]">&nbsp;<?php echo $opt3;?>

                                    <?php
                    }
                    ?>
                                </td>
                            </tr>
                            <?php }?>
                            <?php if(isset($opt4)){?>
                            <tr class="light">
                                <td>&nbsp;&emsp;
                                    <?php //opt4
                
                if(strpos($opt4, 'opt_images/') !== FALSE)
                { 
                    
                    ?>
                                    <input type="radio" value="4"
                                        name="ques_no[<?php echo $question_no; ?>]">&nbsp;<?php echo ' <img src=" '.  $opt4 . ' " height="150" width="150"> ';?>
                                    <?php
                }
                else
                {
                ?>
                                    <input type="radio" value="4"
                                        name="ques_no[<?php echo $question_no; ?>]">&nbsp;<?php echo $opt4;?>

                                    <?php
                    }
                    ?>
                                </td>
                            </tr>
                            <?php }?>
                            <tr class="light">
                                <td><input type="radio" checked="checked" style="display:none" value="no_attempt"
                                        name="ques_no[<?php echo $question_no; ?>]"></td>
                            </tr>
                        </tbody>

                    </table>
                    <?php $i++;}?>


                    <center><input type="submit" value="submit Quiz" class="btn btn-success" /></center>
                </form>
            </div>
            <div class="col-sm-2"></div>
        </center>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
    (function drawCanvas() {
        var canvas = document.getElementById('mycanvas');
        var ctx = canvas.getContext('2d');
        var cWidth = canvas.width;
        var cHeight = canvas.height;

        var countTo = "<?php echo"$exam_time"?>";;


        var min = Math.floor(countTo / 60);
        var sec = countTo - (min * 60);
        var counter = 0;
        var angle = 270;
        var inc = 360 / countTo;


        function drawScreen() {



            //======= reset canvas

            ctx.fillStyle = "#fcfafa";
            ctx.fillRect(0, 0, cWidth, cHeight);

            //========== base arc

            ctx.beginPath();
            ctx.strokeStyle = "#252424";
            ctx.lineWidth = 14;
            ctx.arc(cWidth / 2, cHeight / 2, 100, (Math.PI / 180) * 0, (Math.PI / 180) * 360, false);
            ctx.stroke();
            ctx.closePath();

            //========== dynamic arc

            ctx.beginPath();
            ctx.strokeStyle = "#df8209"; //circle border colour
            ctx.lineWidth = 14;
            ctx.arc(cWidth / 2, cHeight / 2, 100, (Math.PI / 180) * 270, (Math.PI / 180) * angle, false);
            ctx.stroke();
            ctx.closePath();

            //======== inner shadow arc

            grad = ctx.createRadialGradient(cWidth / 2, cHeight / 2, 80, cWidth / 2, cHeight / 2, 115);
            grad.addColorStop(0.0, 'rgba(0,0,0,.4)');
            grad.addColorStop(0.5, 'rgba(0,0,0,0)');
            grad.addColorStop(1.0, 'rgba(0,0,0,0.4)');

            ctx.beginPath();
            ctx.strokeStyle = grad;
            ctx.lineWidth = 14;
            ctx.arc(cWidth / 2, cHeight / 2, 100, (Math.PI / 180) * 0, (Math.PI / 180) * 360, false);
            ctx.stroke();
            ctx.closePath();

            //======== bevel arc

            grad = ctx.createLinearGradient(cWidth / 2, 0, cWidth / 2, cHeight);
            grad.addColorStop(0.0, '#6c6f72');
            grad.addColorStop(0.5, '#252424');

            ctx.beginPath();
            ctx.strokeStyle = grad;
            ctx.lineWidth = 1;
            ctx.arc(cWidth / 2, cHeight / 2, 93, (Math.PI / 180) * 0, (Math.PI / 180) * 360, true);
            ctx.stroke();
            ctx.closePath();

            //====== emboss arc

            grad = ctx.createLinearGradient(cWidth / 2, 0, cWidth / 2, cHeight);
            grad.addColorStop(0.0, 'transparent');
            grad.addColorStop(0.98, '#6c6f72');

            ctx.beginPath();
            ctx.strokeStyle = grad;
            ctx.lineWidth = 1;
            ctx.arc(cWidth / 2, cHeight / 2, 107, (Math.PI / 180) * 0, (Math.PI / 180) * 360, true);
            ctx.stroke();
            ctx.closePath();

            //====== Labels

            var textColor = '#646464';
            var textSize = "12";
            var fontFace = "helvetica, arial, sans-serif";

            ctx.fillStyle = textColor;
            ctx.font = textSize + "px " + fontFace;
            ctx.fillText('MIN', cWidth / 2 - 46, cHeight / 2 - 40);
            ctx.fillText('SEC', cWidth / 2 + 25, cHeight / 2 - 15);

            //====== Values



            ctx.fillStyle = '#6292ae';

            if (min > 9) {
                ctx.font = '55px ' + fontFace;
                ctx.fillText(min, cWidth / 2 - 60, cHeight / 2 + 35);

                ctx.font = '35px ' + fontFace;

            } else {
                ctx.font = '84px ' + fontFace;
                ctx.fillText(min, cWidth / 2 - 60, cHeight / 2 + 35);
            }

            ctx.font = '35px ' + fontFace;
            if (sec < 10) {
                ctx.fillText('0' + sec, cWidth / 2 + 10, cHeight / 2 + 35);
            } else {
                ctx.fillText(sec, cWidth / 2 + 10, cHeight / 2 + 35);
            }


            if (sec <= 0 && counter < countTo) {
                angle += inc;
                counter++;
                min--;
                sec = 59;

            } else
            if (counter >= countTo) {
                sec = 0;
                min = 0;
                document.getElementById("form1").submit();
            } else {
                angle += inc;
                counter++;
                sec--;

            }
        }

        setInterval(drawScreen, 1000);

    })()
    </script>
</body>

</html>