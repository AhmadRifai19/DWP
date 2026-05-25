<?php
$con = new mysqli("localhost", "root", "", "db_dpw");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>