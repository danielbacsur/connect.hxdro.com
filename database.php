<?php
session_start();
$con = mysqli_connect("localhost","hxdro","12345678","hxdro");
if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
?>