<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
header("location: login.php");
exit;
}

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/studentroom/partials/nav_exam.php";
include_once($path);


    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/studentroom/partials/_dbconnect.php";
    include_once($path);
    $right=0;
    $wrong=0;
    $no_answer=0;
	
    $exam_category_name = $_SESSION['exam_category_name'];
    //echo $exam_category_name;
    //print_r($_POST) ;
    foreach($_POST['ques_no'] as $ques_no => $option_val) 
    {
       // echo $ans;
       // echo" --";
        
        $res = mysqli_query($conn, "select * from exam_questions where ques_id = '$ques_no' ");
        while($row=mysqli_fetch_array($res))
        {
            if($row['answer']==$option_val)
            {
                $right++;
            }
            elseif($option_val=="no_attempt")
            {
                $no_answer++;
            }
            else
            {
                $wrong++;
            }
        }
       
       // echo "loop--";
    }
        
    
    $array=array();
    $array['right']=$right;
    $array['wrong']=$wrong;
    $array['no_answer']=$no_answer; 
//print_r($array);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Answer</title>
</head>



<body>
    <center>
        <?php
	$total_qus=$array['right']+$array['wrong']+$array['no_answer'];
	$attempt_qus=$array['right']+$array['wrong'];
	?>
        <div class="container my-4">
            <div class="col-sm-2 my-4"></div>
            <div class="col-sm-8 my-4">
                <h4>Your Quiz results</h4>
                <table class="table table-bordered my-4">
                    <thead>
                        <tr>
                            <th>Total number of Questions</th>
                            <th><?php echo $total_qus; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Attempted qusetions</td>
                            <td><?php echo $attempt_qus;?></td>
                        </tr>
                        <tr>
                            <td class="text-success">Right answer </td>
                            <td class="text-success"><?php echo $array['right'];?></td>
                        </tr>
                        <tr>
                            <td class="text-danger">Wrong answer</td>
                            <td class="text-danger"><?php echo $array['wrong'];?></td>
                        </tr>
                        <tr>
                            <td>No answer</td>
                            <td><?php echo $array['no_answer'];?></td>
                        </tr>
                        <tr class="text-primary">
                            <td class="text-primary">Your result</td>
                            <td><?php 
		$per=($array['right']*100)/($total_qus);
		
		echo $per."%";
		?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>












    </center>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>

</html>