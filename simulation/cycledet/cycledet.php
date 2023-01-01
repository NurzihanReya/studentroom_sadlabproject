<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cycle Detection</title>
    <link
      		href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
     		 rel="stylesheet"
    	/>
    	<link
      		href="https://getbootstrap.com/docs/5.3/assets/css/docs.css"
      		rel="stylesheet"
    	/>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  </head>
  <body>
  <?php require '_nav.php' ?>
    <br>
    <h1 align="Center"><u>Cycle Detection</u></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <span class="border">
    <p>
    Use DFS from every unvisited node. Depth First Traversal can be used to detect a cycle in a Graph. 
    There is a cycle in a graph only if there is a back edge present in the graph. A back edge is an 
    edge that is indirectly joining a node to itself (self-loop) or one of its ancestors in the tree 
    produced by DFS. <br>
    To find the back edge to any of its ancestors keep a visited array and if there is a back edge 
    to any visited node then there is a loop and return true.<br>
    <h5>Follow the below steps to implement the above approach:</h5>
    <ul>
    <li>Iterate over all the nodes of the graph and Keep a visited array <i>visited[]</i> to track the visited nodes.</li>
    <li>Run a Depth First Traversal on the given subgraph connected to the current node and pass the parent 
    of the current node. In each recursive-</li>
    <ul>
    <li>Set <i>visited[root]</i> as 1.</li>
    <li>Iterate over all adjacent nodes of the current node in the adjacency list</li>
        <ul>
            <li>If it is not visited then run DFS on that node and return true if it returns true.</li>
            <li>Else if the adjacent node is visited and not the parent of the current node then return true.</li>
        </ul>
    <li>Return false.</li>
    </ul>
    </ul>

    </p>
    </span>
  
  <body>
    <div class="container">
      <img src="cdp.png" alt="image-1" width="500" height="333">
      <span>Cycle Found</span>
      <img src="dcug.png" alt="image-2" width="500" height="333">
      <span>Cycle in Undirected Graph</span>
    </div>

    <br><br>
    <h4 alighn="Center"><u>Simulation:</u></h4>
    <center>
    
    <iframe width="560" height="315" src="https://www.youtube.com/embed/6ZRhq2oFCuo?start=137" 
    title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
    encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    </center>
   

</body>
</html>