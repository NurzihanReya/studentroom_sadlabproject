<?php
 $path = $_SERVER['DOCUMENT_ROOT'];
 $path .= "/studentroom/partials/_dbconnect.php";
 include_once($path);

 $exam_category_id = $_GET["id"];
 mysqli_query($conn, "delete from exam_category where exam_category_id=$exam_category_id");
?>

<?php
echo("<script LANGUAGE='JavaScript'>
        window.alert('Exam category has been deleted successfully!'); window.location.href = 'http://localhost/studentroom/exam/exam_category.php';
</script>");
?>