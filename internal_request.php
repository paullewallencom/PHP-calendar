<?php
session_start();
require("db.php");
require("config.php");
if(isset($_SESSION['LOGGEDIN']) == FALSE) {
    header("Location: " . $config_basedir);
}
if($_GET['action'] == 'getevent'){
    $sql = "SELECT * FROM events WHERE id = " . $_GET['id'] . ";";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    echo "<h1>Event Details</h1>";
    echo $row['name'];
    echo "<p>" . $row['description'] . "</p>";
    echo "<p><strong>Date:</strong> " . date("D jS F Y",
                    strtotime($row['date'])) . "<br />";
    echo "<strong>Time:</strong> " . $row['starttime']
            . " - " . $row['endtime'] . "</p>";
}
?>