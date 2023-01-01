<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
}
else{
  $loggedin = false;
}
echo'
';
  

if(!$loggedin){
  echo'
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand">Student Room</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/studentroom/login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/studentroom/signup.php">Signup</a>
      </li>
    </ul>
  </div>
  </nav> ';
  }

if($loggedin){
  echo'
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand text-white">Student Room</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> 
  <div class="collapse navbar-collapse mr-auto justify-content-between" id="navbarSupportedContent" >
  
  <div class="">
    <ul class="navbar-nav mr-auto ">';
    if($_SESSION['user_type_id'] == 1)
    {
      echo'<li class="nav-item active">
      <a class="nav-link" href="/studentroom/admin_welcome.php">Home<span class="sr-only">(current)</span></a>
      </li>';
    }
    else
    {
      echo'<li class="nav-item active">
      <a class="nav-link" href="/studentroom/user_welcome.php">Home<span class="sr-only">(current)</span></a>
      </li>';
    }
    

    echo'
      
  </ul>
  </div>


  

  <div class="">
    <ul class="navbar-nav mr-auto ">
    
    <li class="nav-item active float-right">
    <a class="nav-link" href="/studentroom/profile.php"><i>'. $_SESSION['name']. '</i></a> 
    </li>
        
    <li class="nav-item active float-right">
    <a class="nav-link" href="/studentroom/logout.php">Logout</a>
    </li>
    </ul>
  </div>
  
  </div>
  </nav>';
  }


?>
<!-- <a class="nav-link" href="/studentroom/profile.php"><i>'. $_SESSION['name']. '</i></a> 

<a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>

<p class="text-light my-2 mx-2"> <i>'. $_SESSION['name']. '</i></p>


<li class="nav-item active">
      <a class="nav-link" href="/studentroom/notification.php">Notification<span class="sr-only">(current)</span></a>
      </li>
    
    
    
       <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Top Categories
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

    $sql = "select cat.category_id, cat.category_name, temp.th_count
            from categories as cat
            RIGHT join (
              select c.category_id as cat_id, count(*) as th_count
              from categories as c
              join threads th on th.thread_cat_id = c.category_id
                WHERE th.status = 1
              group by c.category_id
              order by th_count desc limit 3
            ) as temp on temp.cat_id = cat.category_id;";
    $result = mysqli_query($conn, $sql); 
    
    while($row = mysqli_fetch_assoc($result))
    {
      echo '<a class="dropdown-item" href="threadlist.php?catid='. $row['category_id']. '">' . $row['category_name']. '</a> '; 
      
    }
          
    echo'</li>-->