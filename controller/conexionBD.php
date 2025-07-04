<?php 
    $Dirrecion = new mysqli("localhost", "root", "", "tengouncaso");
    if ($Dirrecion->connect_error) {
        die("Connection failed: " . $Dirrecion->connect_error);
    }