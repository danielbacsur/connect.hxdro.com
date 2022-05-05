<!DOCTYPE html>
<html>
<head>
<title>Hxdro</title>
</head>
<body>
    
    <h1>Hxdro - Connect</h1>
    <p>Kert az otthonodban</p>
<?php


$con = mysqli_connect("localhost","hxdro","12345678","hxdro");
if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
?>


<h1>Hxdro - Connect</h1>
<p>Kert az otthonodban</p>

<form action="" method="post">
NAME: <input type="text" name="name"><br>
MAIL: <input type="text" name="mail"><br>
PASS: <input type="text" name="pass"><br>
ADDR: <input type="text" name="addr"><br>
<input type="submit" name="register">

                                            <?php
                                            if(isset($_POST['register'])){
                                                    $name = $_POST['name'];
                                                    $mail = $_POST['mail'];
                                                    $pass = $_POST['pass'];
                                                    $addr = $_POST['addr'];
                                                    $insert_customer = "insert into accounts (account_name,account_mail,account_pass,account_addr) values ('$name','$mail','$pass','$addr')";
                                                    $run_customer = mysqli_query($con,$insert_customer);
                                            }
                                            ?>


</body>
</html>