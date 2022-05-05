<!DOCTYPE html>
<?php include("database.php"); ?>
<html>
<head>
<title>Hxdro</title>
</head>
<body>
    
    <h1>Connect</h1>

    <?php
    $qry_account = "SELECT * FROM accounts WHERE account_email='$email'";
    $run_account = mysqli_query($con, $qry_account);
    $row_account = mysqli_fetch_array($run_account);
    $account_id = $row_account['account_id'];
    echo $account_id;
    ?>
<form action="" method="post">
NAME: <input type="text" name="name"><br>
MAIL: <input type="text" name="email"><br>
PASS: <input type="text" name="pass"><br>
FN: <input type="text" name="farm_name"><br>
<input type="submit" name="connect">

<?php
if(isset($_POST['connect'])){
    $account_name = $_POST['name'];
    $account_email = $_POST['email'];
    $account_pass = $_POST['pass'];
    $qry_account = "insert into accounts (account_name,account_email,account_pass) values ('$account_name','$account_email','$account_pass')";
    $run_account = mysqli_query($con, $qry_account);
    
    $qry_account = "SELECT * FROM accounts WHERE account_email='$email'";
    $run_account = mysqli_query($con, $qry_account);
    $row_account = mysqli_fetch_array($run_account);
    $account_id = $row_account['account_id'];
    echo $account_id;
    
    /*$farm_apikey = $_GET['farm_apikey'];
    echo $farm_apikey;
    $farm_name = $_POST['farm_name'];
    $qry_farm = "insert into farms (farm_apikey, farm_account, farm_name) values ('$farm_apikey', '$account_id', '$farm_name')";
    $run_farm = mysqli_query($con, $qry_farm);


    $sel_farm = "SELECT * FROM farms WHERE farm_apikey='$farm_apikey'";
    $run_farm = mysqli_query($con, $sel_farm);
    $row_farm = mysqli_fetch_array($run_farm);
    $farm_id = $row_farm['farm_id'];


    echo 'farm_id='.$farm_id;
    echo 'farm_apikey='.$farm_apikey;*/

    //header( 'Location: http://console.hxdro.com/'.$account_id.'/69420' );

} ?>

</body>
</html>