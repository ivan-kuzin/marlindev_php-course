<?php
    $dbtype = 'mysql';
    $dbhostname = 'localhost';
    $dbname = 'task_17';
    $dbusername = 'root';
    $dbpassword = 'root';
    $pdo = new PDO($dbtype .':hostname='. $dbhostname .';dbname='. $dbname, $dbusername, $dbpassword);
?>