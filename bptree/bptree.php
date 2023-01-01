<?php
session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>B+ Tree Algorithm</title>
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
    <h1 align="Center"><u>B+ Tree Algorithm</u></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <div class="container my-5">
        <span class="border">
            <p>
                In order, to implement dynamic multilevel indexing, B-tree and B+ tree are generally employed.
                The drawback of the B-tree used for indexing, however, is that it stores the data pointer
                (a pointer to the disk file block containing the key value), corresponding to a particular key
                value, along with that key value in the node of a B-tree. This technique, greatly reduces the
                number of entries that can be packed into a node of a B-tree, thereby contributing to the
                increase in the number of levels in the B-tree, hence increasing the search time of a record. <br>
                B+ tree eliminates the above drawback by storing data pointers only at the leaf nodes of the tree.
                Thus, the structure of leaf nodes of a B+ tree is quite different from the structure of
                internal nodes of the B tree. It may be noted here that, since data pointers are present
                only at the leaf nodes, the leaf nodes must necessarily store all the key values along with
                their corresponding data pointers to the disk file block, in order to access them. Moreover,
                the leaf nodes are linked to providing ordered access to the records. The leaf nodes,
                therefore form the first level of the index, with the internal nodes forming the other
                levels of a multilevel index. Some of the key values of the leaf nodes also appear in the
                internal nodes, to simply act as a medium to control the searching of a record. From the
                above discussion, it is apparent that a B+ tree, unlike a B-tree has two orders, a and b,
                one for the internal nodes and the other for the external (or leaf) nodes. The structure
                of the internal nodes of a B+ tree of order a is as follows:<br>

            <p>Each internal node is of the form: (P1, K1, P2, K2, ….., Pc-1, Kc-1, Pc) where c <= a and each Pi is a
                    tree pointer (i.e points to another node of the tree) and, each Ki is a key-value.<br>
                    Every internal node has : K1 < K2 < …. < Kc-1.<br>
                        For each search field values X in the sub-tree pointed at by Pi, the following condition
                        holds : Ki-1 < X <=Ki, for 1 < i < c and, Ki-1 < X, for i=c Each internal node has at most a
                            tree pointers. The root node has, at least two tree pointers, while the other internal nodes
                            have at least ceil(a/2) tree pointers each. If an internal node has c pointers, c <=a, then
                            it has c – 1 key values.<br>
                            <hr>
            </p>
            </p>
        </span>

        <h4 alighn="Center">Simulation:</h4>

        <span class="border">
            <center>

                <video id="myVideo" width="900" height="500" controls>
                    <source src="B+ tree simulation.mp4" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>

                <script>
                var vid = document.getElementById("myVideo");

                function getPlaySpeed() {
                    alert(vid.playbackRate);
                }

                function setPlaySpeed() {
                    vid.playbackRate = 0.5;
                }
                </script>

            </center>
        </span>
    </div>

</body>

</html>