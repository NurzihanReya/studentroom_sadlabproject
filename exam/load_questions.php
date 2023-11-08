<?php
session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
header("location: login.php");
exit;
}
?>

<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/studentroom/partials/_dbconnect.php";
    include_once($path);
?>


<?php
    $question_no = "";
    $question = "";
   
    $opt1 = "";
    $opt2 = "";
    $opt3 = "";
    $opt4 = "";
    $answer = "";
    $count = 0;
    $ans = "";

    $exam_category_name = $_SESSION['exam_category_name'];
    $ques_id = $_GET['questionno'];
    
    $queno = $_GET["questionno"];

    if(isset($_SESSION["answer"][$queno]))
    {
        $ans = $_SESSION["answer"]["$queno"];
    }

    $res = mysqli_query($conn, "select * from exam_questions where category='$exam_category_name' && ques_id='$ques_id'  ");
   
    $count=mysqli_num_rows($res);
    
    
    if($count==0)
    { 
        echo "over";
    }
    else
    {
        while($row=mysqli_fetch_array($res))
        {
            $question_no = $row["ques_id"];
            $question = $row["ques_desc"];
            $opt1 = $row["opt1"];
            $opt2 = $row["opt2"];
            $opt3 = $row["opt3"];
            $opt4 = $row["opt4"];
            
        }
?>

<br>
<div class="text-center">
    <table style="color:#FFFFFF">
        <tr>
            <td style="font-weight: bold; font-color: white; font-size: 20 px; padding-left:5px" colspan="2">
                <?php echo "". $question_no .".  ". $question; ?>
            </td>
        </tr>
    </table>

    <table style="color:#FFFFFF">
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" style="color:#FFFFFF" value="<?php echo $opt1; ?>"
                    onclick="radioclick(this.value, <?php echo $question_no ?>" <?php 
            if($ans==$opt1)
            {
                echo "checked";
            }
            ?>>
            </td>
            <td style="padding-left: 10px" style="color:#FFFFFF">
                <?php
            
        if(strpos($opt1, 'opt_images/') !== FALSE)
        { 
            //$value = 1;
            //echo $value;
            echo ' <img src=" '.  $opt1 . ' " height="80" width="100"> ';
            }
            else
            {
               // $value = 0;
            echo $opt1;
            //echo $value;
            }
            ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" id="r1" style="color:#FFFFFF" value="<?php echo $opt2; ?>"
                    onclick="radioclick(this.value, <?php echo $question_no ?>" <?php 
            if($ans==$opt2)
            {
                echo "checked";
            }
            ?>>
            </td>
            <td style="padding-left: 10px" style="color:#FFFFFF">
                <?php
        if(strpos($opt2, 'opt_images/') !== FALSE)
        { 
            echo ' <img src=" '.  $opt2 . ' " height="80" width="100"> ';
            }
            else
            {
            echo $opt2;
            }
            ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" id="r1" style="color:#FFFFFF" value="<?php echo $opt3; ?>"
                    onclick="radioclick(this.value, <?php echo $question_no ?>" <?php 
            if($ans==$opt3)
            {
                echo "checked";
            }
            ?>>
            </td>
            <td style="padding-left: 10px" style="color:#FFFFFF">
                <?php
         if(strpos($opt3, 'opt_images/') !== FALSE)
         { 
             echo ' <img src=" '.  $opt3 . ' " height="80" width="100"> ';
             }
             else
             {
             echo $opt3;
             }
            ?>
            </td>
        </tr>

        <tr>
            <td>
                <input type="radio" name="r1" id="r1" style="color:#FFFFFF" value="<?php echo $opt4; ?>"
                    onclick="radioclick(this.value, <?php echo $question_no ?>" <?php 
            if($ans==$opt4)
            {
                echo "checked";
            }
            ?>>
            </td>
            <td style="padding-left: 10px" style="color:#FFFFFF">
                <?php
         if(strpos($opt4, 'opt_images/') !== FALSE)
         { 
             echo ' <img src=" '.  $opt4 . ' " height="80" width="100"> ';
             }
             else
             {
             echo $opt4;
             }
            ?>
            </td>
        </tr>


    </table>

    <?php
}
?>
</div>
<script type="text/javascript">
function radioclick(radiovalue, questionno) { //hocche na

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        }
    };
    xmlhttp.open("GET", "save_ans_in_session.php?questionno=" + questionno + "$value=" + radiovalue, true);
    xmlhttp.send(null);
}
</script>