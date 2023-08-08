<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$server = "localhost";
$username = "naufalazryan";
$password = "23042005BJBfy@";
$database = "villaloka";    

$koneksi = mysqli_connect($server, $username, $password, $database) or die("failed to connect to database");

    