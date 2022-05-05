<!DOCTYPE html>
<html>
<head>
<title>Hxdro</title>
</head>
<body>

<h1>Hxdro - Connect</h1>
<p>Kert az otthonodban</p>

                                        <form action="" method="post" enctype="multipart/form-data" ><!-- form Starts -->
                                            <div class="form-group" ><!-- form-group Starts -->
                                            <label>Neved</label>
                                            <input type="text" class="form-control" name="c_name" required>
                                            </div><!-- form-group Ends -->
                                            <div class="form-group"><!-- form-group Starts -->
                                            <label> Email címed</label>
                                            <input type="text" class="form-control" name="c_email" required>
                                            </div><!-- form-group Ends -->
                                            <div class="form-group"><!-- form-group Starts -->
                                            <label> Jelszavad </label>
                                            <div class="input-group"><!-- input-group Starts -->
                                            <span class="input-group-addon"><!-- input-group-addon Starts -->
                                            <i class="fa fa-check tick1"> </i>
                                            <i class="fa fa-times cross1"> </i>
                                            </span><!-- input-group-addon Ends -->
                                            <input type="password" class="form-control" id="pass" name="c_pass" required>
                                            <span class="input-group-addon"><!-- input-group-addon Starts -->
                                            <div id="meter_wrapper"><!-- meter_wrapper Starts -->
                                            <span id="pass_type"> </span>
                                            <div id="meter"> </div>
                                            </div><!-- meter_wrapper Ends -->
                                            </span><!-- input-group-addon Ends -->
                                            </div><!-- input-group Ends -->
                                            </div><!-- form-group Ends -->
                                            <div class="form-group"><!-- form-group Starts -->
                                            <label> Jelszó megerősítése</label>
                                            <div class="input-group"><!-- input-group Starts -->
                                            <span class="input-group-addon"><!-- input-group-addon Starts -->
                                            <i class="fa fa-check tick2"> </i>
                                            <i class="fa fa-times cross2"> </i>
                                            </span><!-- input-group-addon Ends -->
                                            <input type="password" class="form-control confirm" id="con_pass" required>
                                            </div><!-- input-group Ends -->
                                            </div><!-- form-group Ends -->
                                            <div class="form-group"><!-- form-group Starts -->
                                            <label> Ország</label>
                                            <input type="text" class="form-control" name="c_country" required>
                                            </div><!-- form-group Ends -->
                                            <div class="form-group"><!-- form-group Starts -->
                                            <label> Város </label>
                                            <input type="text" class="form-control" name="c_city" required>
                                            </div><!-- form-group Ends -->
                                            <div class="form-group"><!-- form-group Starts -->
                                            <label> Telefonszám</label>
                                            <input type="text" class="form-control" name="c_contact" required>
                                            </div><!-- form-group Ends -->
                                            <div class="form-group"><!-- form-group Starts -->
                                            <label> Lakcím </label>
                                            <input type="text" class="form-control" name="c_address" required>
                                            </div><!-- form-group Ends -->
                                            <div class="form-group"><!-- form-group Starts -->
                                            </div><!-- form-group Ends -->
                                            <div class="text-center"><!-- text-center Starts -->
                                            <button type="submit" name="register" class="btn btn-primary">
                                            <i class="fa fa-user-md"></i> Regisztrálás
                                            </button>
                                            </div><!-- text-center Ends -->
                                            </form><!-- form Ends -->

                                            <?php
                                            if(isset($_POST['register'])){
                                                    $c_name = $_POST['c_name'];
                                                    $c_email = $_POST['c_email'];
                                                    $c_pass = $_POST['c_pass'];
                                                    $c_pass_hash = hash("sha256", $c_pass);
                                                    $c_country = $_POST['c_country'];
                                                    $c_city = $_POST['c_city'];
                                                    $c_contact = $_POST['c_contact'];
                                                    $c_address = $_POST['c_address'];
                                                    $c_ip = getRealUserIp();
                                                    $get_email = "select * from customers where customer_email='$c_email'";
                                                    $run_email = mysqli_query($con,$get_email);
                                                    $check_email = mysqli_num_rows($run_email);
                                                    if($check_email == 1){
                                                        echo "<script>alert('Ez az email cím már regisztrálva lett. Próbálj másikat.')</script>";
                                                        exit();
                                                    }
                                                    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_ip) values ('$c_name','$c_email','$c_pass_hash','$c_country','$c_city','$c_contact','$c_address','$c_ip')";
                                                    $run_customer = mysqli_query($con,$insert_customer);
                                                    $sel_cart = "select * from cart where ip_add='$c_ip'";
                                                    $run_cart = mysqli_query($con,$sel_cart);
                                                    $check_cart = mysqli_num_rows($run_cart);
                                                    if($check_cart>0){
                                                        $_SESSION['customer_email']=$c_email;
                                                        echo "<script>alert('Fiókodat sikeresen regisztráltuk!')</script>";
                                                        echo "<script>window.open('cart.php','_self')</script>";
                                                    } else {
                                                        $_SESSION['customer_email']=$c_email;
                                                        echo "<script>alert('Fiókodat sikeresen regisztráltuk!')</script>";
                                                        echo "<script>window.open('index.php','_self')</script>";
                                                    }
                                            }

</body>
</html>