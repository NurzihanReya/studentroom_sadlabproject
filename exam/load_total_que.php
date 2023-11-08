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
$total_que=0;
$res1 = mysqli_query($conn, "select * from exam_questions where category = '$_SESSION[exam_category_name]' ");
$total_que = mysqli_num_rows($res1);

echo $total_que;
?>