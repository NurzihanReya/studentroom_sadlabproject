<?php
session_start(); //Every page that will use the session information on the website must be identified by the session_start() function. This initiates a session on each PHP page. The session_start function must be the first thing sent to the browser or it won't work properly. 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}


?>

<?php require 'partials/_nav.php' ?>

<!doctype html>
<html>




<head>
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
    </style>
</head>


<body>



    <div id="tools">
        <label id="n-container">
            <span>n : 8 </span>
            <input style="width:200px;" id="n" type="range" min="1" max="30" value="8" />
        </label>
        <label id="delay-container">
            <span>Delay : </span>
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
        }).then(status => {
            document.querySelector('#genetic .status').innerHTML = 'stopped';
            document.querySelector('#genetic .exec-time').innerHTML = ((new Date()).getTime() - genTimer) /
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