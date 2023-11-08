<?php
session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
header("location: login.php");
exit;
}
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

    <title>Profile</title>
</head>

<body>

    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_nav.php'; ?>
    <div>
        <div class="mx-auto mt-3" style="width: 1500px;">
            <div class="container-fluid  mx-1 my-2">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                    </tr>

                    <?php
                echo "<tr>";
                echo "<td>"; echo $_SESSION['name'] ; echo "</td>";
                echo "<td>"; echo $_SESSION['username'];  echo "</td>";
                if($_SESSION['user_type_id'] == 1)
                {
                    echo "<td>"; echo "Admin";  echo "</td>";   
                }
                else if($_SESSION['user_type_id'] == 2)
                {
                    echo "<td>"; echo "Regular";  echo "</td>";
                }
                echo "</tr>";
                    ?>


            </div>
        </div>

    </div>

    <div style="width: 1500px;">

        <?php
        if($_SESSION['user_type_id'] == 1)
        {
            echo"<h3> Post Requests</h3>";
            $sql = "SELECT * FROM `threads` WHERE status = 0"; 
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            $number = 0;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $id = $row['thread_id'];
                $title = $row['thread_title'];
                $desc = $row['thread_desc']; 
                $thread_time = $row['timestamp']; 
                $thread_user_id = $row['thread_user_id'];
                $status = $row['status'];
                $number = $number+1;
                
                
                $sql2 = "SELECT * FROM `users` WHERE sno='$thread_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo '
                <div style="width: 1500px;">
                    <div class="container-fluid  mx-1 my-2">
                        <div class="media my-3">
                        
                        <img style="border-radius: 50%; height: 54px; width:54px; padding: 5px;" src="data:images/jpeg;base64,'.base64_encode($row2['images']).'"/>
                            <div class="media-body">'.
                                '<h5 class="mt-0"> <a class="text-dark" href="threads.php?threadid=' . $id. ' ">'. $title . ' </a></h5>
                                '. $desc . 
                            '</div>'.
                        '<div class="font-weight-bold my-0"> Asked by: '. $row2['name'] . ' at '. $thread_time. 
                        '</div>'. 
                    
                    '<form method="post" action="">'; 
        ?>

        <button class="btn btn-success mx-2 my-2 my-sm-0" type="submit" name="approved"> <a
                href="approve_post.php?id= <?php echo $id; ?> " style="color:#ffffff;">
                Approve </a></button>
        <?php echo'
                    </form>
                    <form method="post" action="">'; ?>

        <button class=" btn btn-danger mx-2 my-2 my-sm-0" type="submit" name="rejected"> <a
                href="reject_post.php?id= <?php echo $id; ?> " style="color:#ffffff;">
                Reject</a></button>
        <?php echo'
                    </form>
                    </div>
                </div>';

            
            }
            if($noResult){
            echo '
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <p class="display-4">No Post Request Found</p>

                </div>
            </div> ';
            }
        }

        ?>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
</body>

</html>