<?php
session_start();

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/studentroom/partials/_dbconnect.php";
include_once($path);

$exam_category = $_GET["exam_category"];
$_SESSION["exam_category"] = $exam_category;

$res=mysqli_query($conn, "select * from exam_category where exam_category_name = '$exam_category'");
while($row = mysqli_fetch_array($res))
{
    $_SESSION["exam_time"] = $row["exam_time_in_min"];
}
$date = date("Y-M-D h:i:s");

$_SESSION["end_time"] = date("Y-M-D h:i:s", strtotime($date."+ $_SESSION[exam_time] minutes"));
$_SESSION["exam_start"] = "yes";
?>