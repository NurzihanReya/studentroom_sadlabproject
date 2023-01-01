<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
header("location: login.php");
exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prim's Algorithm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/studentroom/partials/_nav.php";
    include_once($path);
?>
    <br>
    <h1 align="Center"><u>Prim's Algorithm</u></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <span class="border">
        <p>
            In Prim’s algorithm, two sets are maintained, one set contains list of vertices already included in
            MST, other set contains vertices not yet included. In every iteration, we consider the minimum
            weight edge among the edges that connect the two sets.<br>
            The implementation discussed in previous post uses two arrays to find minimum weight edge that
            connects the two sets. Here we use one in <b>MST[V]</b>. The value of <b>MST[i]</b> is going to be true if
            vertex i is included in the MST. In every pass, we consider only those edges such that one vertex
            of the edge is included in MST and other is not. After we pick an edge, we mark both vertices as
            included in MST.
        <h4><u>How does Prim’s Algorithm Work?</u></h4> <br>
        The idea behind Prim’s algorithm is simple, a spanning tree means all vertices must be connected.
        So the two disjoint subsets (discussed above) of vertices must be connected to make a Spanning Tree.
        And they must be connected with the minimum weight edge to make it a Minimum Spanning Tree.<br>

        <h5>Follow the given steps to find MST using Prim’s Algorithm:</h5>
        <ol>

            <li>Create a set mstSet() that keeps track of vertices already included in MST.</li>
            <li>Assign a key value to all vertices in the input graph. </li>
            <li>Initialize all key values as INFINITE. </li>
            <li>Assign the key value as 0 for the first vertex so that it is picked first. </li>
            <li>While mstSet() doesn’t include all vertices, pick a vertex u which is not there in mstSet
                and has a minimum key value. </li>
            <li>Include u in the mstSet(). </li>
            <li>Update the key value of all adjacent vertices of u. To update the key values, iterate through
                all adjacent vertices. </li>
            <li>For every adjacent vertex v, if the weight of edge u-v is less than the
                previous key value of v, update the key value as the weight of u-v.</li>
            <li>The idea of using key values is to pick the minimum weight edge from the cut. </li>
            <li>The key values are used only for vertices that are not yet included in MST, the key value for these
                vertices indicates the minimum weight edges connecting them to the set of vertices included in MST.</li>

        </ol>
        </p>
    </span>

    <h4 alighn="Center"><u>Simulation:</u></h4>

    <span class="border">
        <center>

            <iframe width="560" height="315" src="https://www.youtube.com/embed/oDnlIP5pe5o?start=9"
                title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
    encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </center>
    </span>


</body>

</html>