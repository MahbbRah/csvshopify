<?php
session_start();
if(isset($_SESSION['progress']))
    $progress = $_SESSION['progress'] = $_SESSION['progress'] + 10;
else
    $progress = $_SESSION['progress'] = 10;
if($progress < 100){
    echo '<head><meta http-equiv="refresh" content="1; 
            url=http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" /></head>
        <body>'.$progress.'%</body>';
} else {
    echo 'Done';
}