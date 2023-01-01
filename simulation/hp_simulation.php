<?php


    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simulations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <?php require 'partials\_nav.php' ?>
    <br><br>
  <center>
  <h1><b><i>Simulation</i></b></h1>
  <div style="width: 18rem;">
  <img src="images/Group 57.png" class="card-img-top" alt="simulation-icon">
  </div>
  </center>
  <br><br><br><br>

<!-- Image cards -->

<div class="row">
  <div class="col-sm-6">
  <img src="images/sorting.png" height="350px" width="100px" class="card-img-top" alt="ms">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Merge Sort</h5>
        <p class="card-text">Click here to learn about Merge Sort.</p>
        <a href="mergesort/index.php" class="btn btn-primary">Details</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
  <img src="images/crown.png" height="350px" width="100px" class="card-img-top" alt="nqp">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">N Queens Problem</h5>
        <p class="card-text">Click here to learn about N Queens Problem.</p>
        <a href="nqueens/simulation.php" class="btn btn-primary">Details</a>
      </div>
    </div>
  </div>
  
  <div class="col-sm-6">
  <img src="images/tree.png" height="350px" width="100px" class="card-img-top" alt="bpt">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">B+ Tree</h5>
        <p class="card-text">Click here to learn about B+ Tree.</p>
        <a href="bptree/bptree.php" class="btn btn-primary">Details</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
  <img src="images/mst.png"  height="350px" width="100px" class="card-img-top" alt="pa">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Prim's Algorithm</h5>
        <p class="card-text">Click here to learn about Prim's Algorithm.</p>
        <a href="prims/prims.php" class="btn btn-primary">Details</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
  <img src="images/cf.png" height="350px" width="100px" class="card-img-top" alt="cf">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cycle Detection</h5>
        <p class="card-text">Click here to learn about Cycle Detection.</p>
        <a href="cycledet/cycledet.php" class="btn btn-primary">Details</a>
      </div>
    </div>
  </div>

</div>


  </body>
</html>