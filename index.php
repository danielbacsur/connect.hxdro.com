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
    $qry_account = "insert into accounts (account_name,account_mail,account_pass) values ('$name','$mail','$pass')";
    $run_account = mysqli_query($con, $qry_account);

    $sel_account = "SELECT * FROM accounts WHERE account_mail='$mail'";
    $run_account = mysqli_query($con, $sel_account);
    $row_account = mysqli_fetch_array($run_account);
    $id = $row_account['account_id'];
    
    /*
    $qry_farm = "insert into farms (farm_account,farm_name) values ('$id','$mail')";
    $run_farm = mysqli_query($con, $qry_farm);


    $sel_farm = "SELECT * FROM farms WHERE account_mail='$mail'";
    $run_farm = mysqli_query($con, $sel_farm);
    $row_farm = mysqli_fetch_array($run_farm);
    $id = $row_farm['account_id'];
    */

    header( 'Location: http://console.hxdro.com/'.$id.'/'.$addr );

} ?>

</body>
</html>