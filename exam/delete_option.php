<?php
 $path = $_SERVER['DOCUMENT_ROOT'];
 $path .= "/studentroom/partials/_dbconnect.php";
 include_once($path);

 $ques_id = $_GET["id"];
 $ques_category = $_GET["id1"];
 mysqli_query($conn, "delete from exam_questions where ques_id=$ques_id");
?>

<script LANGUAGE='JavaScript'>
window.alert('Question deleted successfully!');
window.location.href = "add_edit_after_select_exam.php?id=<?php echo $ques_category?>"
</script>