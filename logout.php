<?php
session_start();
session_unset(); //The session_unset() function frees all session variables currently registered. but session still exist kore.
session_destroy(); //session_destroy() destroys all of the data associated with the current session. but global variable er data unset kore na, tai session unset o use kora lage
echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully logged out');
    window.location.href='login.php';
    </script>");


//header("location: login.php");
exit;
?>