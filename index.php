<!DOCTYPE html>
<?php include("database.php"); ?>
<?php include("functions.php"); ?>
<html>
<head>
<title>Hxdro</title>
</head>
<body>
    <?php
    $sel_account = "SELECT COUNT(*) FROM accounts";
    $run_account = mysqli_query($hxdro, $sel_account);
    $account_id = mysqli_fetch_array($run_account);
    echo $account_id; 
    echo $run_account;?>
    
    <h1>Connect</h1>
<form action="" method="post">
Neved: <input type="text" name="name"><br>
Email Cimed: <input type="text" name="email"><br>
Jelszavad: <input type="password" name="pass"><br>
Nevezd el a farmod: <input type="text" name="farm_name"><br>
<input type="submit" name="connect">

<?php
if(isset($_POST['connect'])){
    $sel_account = "SELECT * FROM accounts";
    $run_account = mysqli_query($hxdro, $sel_account);
    $account_id = mysqli_fetch_array($run_account);

    $account_uuid = guid();
    $account_name = $_POST['name'];
    $account_email = $_POST['email'];
    $account_pass = hash('sha256', $_POST['pass']);
    $qry_account = "insert into accounts values ('$account_id', '$account_uuid', '$account_name','$account_email','$account_pass')";
    $run_account = mysqli_query($hxdro, $qry_account);

    $sel_account = "SELECT * FROM farms";
    $run_account = mysqli_query($hxdro, $sel_account);
    $farm_id = mysqli_fetch_array($run_account);
    
    $farm_uuid = $_GET['farm_uuid'];
    $farm_name = $_POST['farm_name'];
    $qry_farm = "insert into farms values ('$farm_id', '$farm_uuid', '$account_uuid', '$farm_name')";
    $run_farm = mysqli_query($hxdro, $qry_farm);

    header( 'Location: http://console.hxdro.com/'.$account_uuid.'/'.$farm_uuid );

} ?>

</body>
</html>