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
Jelszavad: <input type="password" name="pass"><br>
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
    
    $farm_id = $_GET['farm_id'];
    $farm_name = $_POST['farm_name'];
    $qry_farm = "insert into farms values ('$farm_id', '$account_id', '$farm_name')";
    $run_farm = mysqli_query($con, $qry_farm);

    header( 'Location: http://console.hxdro.com/'.$account_id.'/'.$farm_id );

} ?>

</body>
</html>