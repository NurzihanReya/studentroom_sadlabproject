<?php
session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>N Queens Simulation</title>
    <style>
    canvas {
        margin: 50px;
    }

    #tools {
        position: fixed;
        right: 0;
        top: 0;
        width: max-content;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #tools>label {
        text-align: center;
        margin: 20px 20px 20px 0;
        display: flex;
        flex-direction: column;
    }

    #tools>label:last-child {
        flex-direction: row;
        align-items: center;
    }

    #tools>label:last-child>button {
        height: max-content;
        margin: 5px;
    }

    h2 {
        color: black;
        margin-top: 1em;
        margin-bottom: 1em;
        margin-left: 0;
        margin-right: 0;
        text-indent: 30px;
    }
    </style>
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
    <header align="center">
        <div class="header-container">
            <div id="settings-btn">
                <i class="fas fa-bars"></i>
            </div>

            <div>
                <br><u>
                    <h1>N-Queens Problem</h1>
                </u>
            </div>
        </div>
        <div class="gradient-border"></div>
    </header>
    <div class="container my-5">
        <p>The idea is to place queens one by one in different rows, starting from the topmost row. When we place
            a queen in a row, we check for clashes with already placed queens. In the current column, if we find
            a row for which there is no clash, we mark this row and column as part of the solution. If we do not
            find such a row due to clashes, then we backtrack and return false.

        <h4>Method:</h4>
        0) Make a board,make a space to collect all solution states.<br>
        1) Start in the topmost row.<br>
        2) Make a recursive function which takes state of board and the current row number
        as its parameter.<br>
        3) Fill a queen in a safe place and use this state of board to advance to next recursive
        call, add 1 to the current row. Revert the state of board after making the call.<br>
        a) Safe function checks the current column, left top diagonal and right top diagonal.<br>
        b) If no queen is present then fill else return false and stop exploring that state
        and track back to the next possible solution state. <br>
        4) Keep calling the function till the current row is out of bound.<br>
        5) If current row reaches the number of rows in the board then the board is filled.<br>
        6) Store the state and return.<br></p>
        <hr>
        <br><br><br><br>
        <div id="tools">
            <label id="n-container">
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <span>n : 8 </span>
                <input style="width:200px;" id="n" type="range" min="1" max="30" value="8" />
            </label>
            <label id="delay-container">
                <span>Delay(in Milliseconds) : </span>
                <input id="delay" type="number" value="100" />
            </label>
            <label>
                <button id="run">Run</button>
                <button id="stop" disabled>Stop</button>
            </label>
        </div>

        <div style="display: flex;">
            <div id="genetic">
                <div id="genetic-canvas"></div>
                <div class="run-info">
                    <div>
                        Algorithm : <span>Genetic</span>
                    </div>
                    <div>
                        Status :
                        <span class="status">Stopped</span>
                    </div>
                    <div>
                        Progress : <progress max="100" value="0" id="genetic-progress"></progress>
                    </div>
                </div>
            </div>

            <div id="backtracking">
                <div id="backtracking-canvas"></div>
                <div class="run-info">
                    <div>
                        Algorithm : <span>Backtracking</span>
                    </div>
                    <div>
                        Status : <span class="status">Stopped</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/genetic-tools.js"></script>
    <script src="js/chess-ui.js"></script>
    <script src="js/n-queens-genetic-engine.js"></script>
    <script src="js/n-queens-backtracking-engine.js"></script>
    <script>
    function makeLinearDNA(matrix) {
        const linear = [];

        for (let j in matrix) {
            for (let i in matrix[j]) {
                if (!matrix[j][i]) continue;

                linear[j] = i;
            }
        }

        return linear;
    }

    document.getElementById('n').oninput = function(e) {
        document.querySelector('#n-container > span').innerHTML = 'n : ' + this.value;

        engineA.n = engineB.n = +this.value;



        chessA.renderBoard();

        chessB.renderBoard();
    };

    document.getElementById('run').onclick = function() {
        const delay = +document.getElementById('delay').value;
        runEvent();
        let maxConflict = null;
        const genTimer = (new Date()).getTime();


        const backTimer = (new Date()).getTime();

        chessA.run(delay, board => {
                if (maxConflict === null) {
                    maxConflict = engineA.conflictsCount(makeLinearDNA(board));
                    document.getElementById('genetic-progress').setAttribute('max', maxConflict);
                    document.getElementById('genetic-progress').value = 0;
                } else {
                    const conflict = engineA.conflictsCount(makeLinearDNA(board));
                    document.getElementById('genetic-progress').value = maxConflict - conflict;
                }
            })
            .then(status => {
                document.querySelector('#genetic .status').innerHTML = 'stopped';
                document.querySelector('#genetic .exec-time').innerHTML = ((new Date()).getTime() -
                        genTimer) /
                    1000 + 's';
                stopEvent();
            });
        chessB.run(delay).then(status => {
            document.querySelector('#backtracking .status').innerHTML = 'stopped';
            document.querySelector('#backtracking .exec-time').innerHTML = ((new Date()).getTime() -
                genTimer) / 1000 + 's';
            stopEvent();
        });
    };

    document.getElementById('stop').onclick = function() {
        chessA.stop();
        chessB.stop();
        document.querySelectorAll('.status').forEach(el => el.innerHTML = 'stopped');
        stopEvent();
    };

    function runEvent() {
        document.querySelectorAll('.status').forEach(el => el.innerHTML = 'running');
        document.querySelectorAll('.exec-time').forEach(el => el.innerHTML = 'NaN');

        for (let id of ['run', 'delay', 'n']) {
            document.getElementById(id).disabled = true;
        }
        for (let id of ['stop']) {
            document.getElementById(id).disabled = false;
        }
    }

    function stopEvent() {
        for (let id of ['run', 'delay', 'n']) {
            document.getElementById(id).disabled = false;
        }
        for (let id of ['stop']) {
            document.getElementById(id).disabled = true;
        }
    }

    const initialN = 8;
    const engineA = new NQueensGeneticEngine(initialN);
    const engineB = new NQueensBacktrackingEngine(initialN);

    const chessA = new ChessUI(engineA, {
        parent: document.getElementById('genetic-canvas')
    });
    const chessB = new ChessUI(engineB, {
        parent: document.getElementById('backtracking-canvas')
    });

    chessA.renderBoard();
    chessB.renderBoard();
    </script>

</body>

</html>