<?php
session_start();

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/studentroom/partials/_dbconnect.php";
    include_once($path);
	
    $exam_category_name = $_SESSION['exam_category_name'];


	class answer{
		public function answer($data)
		{
			$ans=implode("",$data);
			 $right=0;
			 $wrong=0;
			 $no_answer=0;
			 $res = mysqli_query($conn, "select * from exam_questions where category = '$exam_category_name' ");
			 while($row=mysqli_fetch_array($res))
			{			
				if($row['answer']==$_POST[$question_no])
				{
					 $right++;
				}
				elseif($_POST[$question_no]=="no_attempt")
				{
					 $no_answer++;
				}
				else
				{
					$wrong++;
				}
			}
			$array=array();
			$array['right']=$right;
			$array['wrong']=$wrong;
			$array['no_answer']=$no_answer;
			return $array;
		}
	}

?>