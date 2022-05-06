<?php
$hxdro = mysqli_connect("localhost","hxdro","12345678","hxdro");
if ($hxdro -> connect_errno) {
  echo "Failed to connect to MySQL: " . $hxdro -> connect_error;
  exit();
}
$cloud = mysqli_connect("localhost","hxdro","12345678","hxdro");
if ($cloud -> connect_errno) {
  echo "Failed to connect to MySQL: " . $cloud -> connect_error;
  exit();
}
?>