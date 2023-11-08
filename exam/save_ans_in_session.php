<?php
session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
header("location: login.php");
exit;
}

$questionno = $_GET["questionno"];

$value1 = $_GET["value1"];
$_SESSION["answer"][$questionno]=$value1;
?>