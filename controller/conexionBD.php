<?php 
    $conn = new mysqli("localhost", "root", "", "tengouncaso");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>