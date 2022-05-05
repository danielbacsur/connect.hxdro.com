<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
<head>
<title>Hxdro</title>
</head>
<body>
    
    <h1>Connect</h1>
<form action="" method="post">
NAME: <input type="text" name="name"><br>
MAIL: <input type="text" name="mail"><br>
PASS: <input type="text" name="pass"><br>
ADDR: <input type="text" name="addr"><br>
<input type="submit" name="connect">

<?php
if(isset($_POST['connect'])){
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $addr = $_POST['addr'];
    $insert_customer = "insert into accounts (account_name,account_mail,account_pass,account_addr) values ('$name','$mail','$pass','$addr')";
    $run_customer = mysqli_query($con,$insert_customer);

    echo "<script>window.open('console.hxdro.com?$addr','_self')</script>";
} ?>

</body>
</html>