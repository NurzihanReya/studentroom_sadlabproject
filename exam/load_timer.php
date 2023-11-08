<?php
session_start();
if(!isset($_SESSION["endtime"]))
{
    echo "00:00:00";
}
else
{
    $time1 = gmdate("H:m:s", strtotime($_SESSION["end_timer"])-strtotime(date("Y:m:d h:i:s")));
    if(strtotime(_SESSION["endtime"]) < strtotime(date("Y:M:D h:i:s")))
    {
        echo"00:00:00";
    }
    else
    {
        echo $time1;
    }
}
?>