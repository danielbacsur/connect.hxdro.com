<!DOCTYPE html>
<html>
<head>
<title>Hxdro</title>
</head>
<body>

<?php

$con = mysqli_connect("localhost","hxdro","12345678","hxdro");
session_start();
$insert_customer = "insert into accounts (account_name,account_mail,account_pass,account_addr) values ('admin','contact@danielbacsur.com','1234',','prototype')";
                                                    $run_customer = mysqli_query($con,$insert_customer);
?>


<h1>Hxdro - Connect</h1>
<p>Kert az otthonodban</p>

</body>
</html>