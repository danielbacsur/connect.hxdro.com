<!DOCTYPE html>
<?php include("database.php"); ?>
<?php include("functions.php"); ?>
<html>
<head>
<title>Hxdro</title>
</head>
<body>
    
    <h1>Connect</h1>
<form action="" method="post">
Neved: <input type="text" name="name"><br>
Email Cimed: <input type="text" name="email"><br>
Jelsyavad: <input type="password" name="pass"><br>
Nevezd el a farmod: <input type="text" name="farm_name"><br>
<input type="submit" name="connect">

<?php
if(isset($_POST['connect'])){
    $account_id = guid();
    $account_name = $_POST['name'];
    $account_email = $_POST['email'];
    $account_pass = $_POST['pass'];
    $qry_account = "insert into accounts values ('$account_id', '$account_name','$account_email','$account_pass')";
    $run_account = mysqli_query($con, $qry_account);
    
    $qry_account = "SELECT * FROM accounts WHERE account_email='$account_email'";
    $run_account = mysqli_query($con, $qry_account);
    $row_account = mysqli_fetch_array($run_account);
    $account_id = $row_account['account_id'];
    
    $farm_id = guid();
    $farm_apikey = $_GET['farm_apikey'];
    $farm_name = $_POST['farm_name'];
    $qry_farm = "insert into farms values ('$farm_id', '$farm_apikey', '$account_id', '$farm_name')";
    $run_farm = mysqli_query($con, $qry_farm);

    $sel_farm = "SELECT * FROM farms WHERE farm_apikey='$farm_apikey'";
    $run_farm = mysqli_query($con, $sel_farm);
    $row_farm = mysqli_fetch_array($run_farm);
    $farm_id = $row_farm['farm_id'];

    header( 'Location: http://console.hxdro.com/'.$account_id.'/'.$farm_id );

} ?>

</body>
</html>