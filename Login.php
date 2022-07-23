<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php  include'../HospitalManagementSystem/link.php'?>
    
</head>
<body id="login">
        <?php
            $conn = mysqli_connect('localhost','root','','projectdatabase');
            // if($conn){
            //     echo "connected";
            // }
            if(isset($_POST['submit'])){
                $email = $_POST['email'];
                $password1 = $_POST['password'];


                $sqlPass = "SELECT * FROM  signup where email ='$email' AND status = 'Active'";
                $res1 = mysqli_query($conn,$sqlPass);
                $emailCount = mysqli_num_rows($res1);
                if($emailCount){
                    $pass_email = mysqli_fetch_assoc($res1);
                    $db_pass =$pass_email['password']; 
                    $_SESSION['uName'] = $pass_email['name'];
                    $_SESSION['mobileno'] = $pass_email['mobile'];
                    $_SESSION['email'] = $pass_email['email'];
                    // echo $db_pass."<br>";
                    // echo $password1."<br>";
                    //Database email er corresponding data fetch korchi
                   $verifyPass = password_verify($password1, $db_pass);
                    
                  if( $verifyPass){
                    if(isset($_POST['rememberme'])){
                     
                        setcookie('emailCookie',$email,time()+86400);
                        setcookie('passwordCookie',$password1,time()+86400);
                        header('location:Index.php');
                    }else{
                              ?>
                            <script>
                                
                                alert("Login SuccessFull")
                             
                            </script>

                              <?php
                              header('location:Index.php');
                    }
                          }
                             else{
                                ?>
                                <script>
                                    alert("Invalid Password!")
                                </script>
                                  <?php
                   }
                   
                }
                else{
                    ?>
                    <script>
                        alert("Invalid Email!");
                    </script>
                <?php
                }
            }
        ?>

    <div id="parent">
        <div id="child2">
            
            <div id="innerChild2">
                <div id="heading">Login Form</div>
                <img src="./style/Assets/login1.jpg"  alt="" class="loginSignimg">
                <div id="formfield">
                     <form action="" method="post">
                        <?php 
                        if(isset($_SESSION['massage'])){
                           $set = $_SESSION['massage'];
                           echo  "<p style='background-color:green'> $set </p>";
                        }
                        else{
                            echo "<div style='margin-left:3.5rem'><h2> </h2></div>";
                        }
                        ?>
                        <p><ion-icon name="mail"></ion-icon><input type="text" name="email" id="" placeholder="Enter Register Eamil" value="<?php  
                        if(isset($_COOKIE['emailCookie'])){
                            echo $_COOKIE['emailCookie'];
                            }?>"required></p>
                         
                        <p><ion-icon name="lock-closed"></ion-icon><input type="password" name="password" id="" placeholder="Enter Your Password" value="<?php  
                        if(isset($_COOKIE['passwordCookie'])){
                            echo $_COOKIE['passwordCookie'];
                            }?>" required></p>
                        <p><input type="checkbox" name="rememberme" id="rememberme" value="Log in"><lebel>Remember Me</lebel></p>
                        <p id="inpbtn"><input type="submit" name="submit" id="btn" value="Log in" required></p>
                     </form>
                     <div><a href="./ForgetPassword.php"><h3  id="forgetPassword">Forget Password</h3></a> </div>
                     <h4>Don't Have an Account? <span><a href="../HospitalManagementSystem/Signup.php">Signup</a></span></h4>
                     <a href="../HospitalManagementSystem/Adminlogin.php" class="loginOp">Admin Login</a>
                    <a href="../HospitalManagementSystem/SuperAdminlogin.php" class="loginOp">Super-Admin Login</a>
                    </div>
                <div id="icon">
                    <div id="social">
                        <ion-icon name="logo-google" class="linkGF_img" id="google"></ion-icon>
                        <ion-icon name="logo-facebook" class="linkGF_img" id="facebook"></ion-icon>

                    </div>
                </div>
            </div>
            <div id="innerChild1"></div>
        </div>
    </div>
  
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>