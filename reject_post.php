<?php
 $path = $_SERVER['DOCUMENT_ROOT'];
 $path .= "/studentroom/partials/_dbconnect.php";
 include_once($path);

 $id = $_GET["id"];
 $sql = "UPDATE `threads` SET `status` = -1 WHERE `thread_id` = $id";
 $sql2 = mysqli_query($conn,$sql);
?>

<?php
echo("<script LANGUAGE='JavaScript'>
        window.alert('Post has been rejected successfully!'); window.location.href = 'http://localhost/studentroom/profile.php';
</script>");
?>