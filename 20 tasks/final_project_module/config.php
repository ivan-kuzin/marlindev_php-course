<?php
    $dbtype = 'mysql';
    $dbhostname = 'localhost';
    $dbname = 'final_project_1';
    $dbusername = 'root';
    $dbpassword = 'root';
    $pdo = new PDO($dbtype .':hostname='. $dbhostname .';dbname='. $dbname, $dbusername, $dbpassword);
?>