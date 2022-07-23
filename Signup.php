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
    <?php include'../HospitalManagementSystem/link.php'?>
    
</head>
<body>
    <?php
    $conn = mysqli_connect('localhost','root','','projectdatabase');

    // if($conn){
    //     echo "Connection Successfull";
    // }
    // else{
    //     echo "connection Failed";
    // }

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $_SESSION['userName'] = "$name";
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $number = mysqli_real_escape_string($conn,$_POST['number']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $cpassword = mysqli_real_escape_string($conn,$_POST['cPassword']);
        
        $encryptPassword = password_hash($password,PASSWORD_BCRYPT);
        $token = bin2hex(random_bytes(15));
        // $ranOtp = rand(1000,9999);
        // $_SESSION['otp'] = "$ranOtp";

        $querySql = "SELECT * FROM signup WHERE email ='$email' ";
        $resquery = mysqli_query($conn,$querySql);

        $emailCount = mysqli_num_rows($resquery);


        $querySql1 = "SELECT * FROM signup WHERE mobile ='$number' ";
        $resquery1 = mysqli_query($conn,$querySql1);

        $Numbercount = mysqli_num_rows($resquery1);

        if($emailCount > 0){
            ?>
              <script>
                alert("Email already Exists");
              </script>
            <?php
            
        }
        elseif($Numbercount > 0){
            ?>
            <script>
            alert("This Mobile is already Exists");
          </script>
            <?php
        }
        else{
            if($password === $cpassword ){
             $queryInsert = "INSERT INTO signup (name,email,mobile,password,token,status) VALUES('$name','$email','$number','$encryptPassword','$token','Inactive')";

             $res2 =mysqli_query($conn,$queryInsert);

             if($res2){
                // $to_mail = "$email";
                $subject = "OTP VERIFICATION";
                $body ="Hi, $name. Click Here To Activate your account http://localhost/LearnPhp/HospitalManagementSystem/Activate.php?token=$token";
                $headers ="From: joydipmanna2002@gmail.com";
                if(mail($email, $subject, $body, $headers)){
                // echo "Email Successfully Sent to $email...";
                $_SESSION['massage'] ="Check Your Mail to activate your account $email";
                 header("location: Login.php");
                }
                else{
                       echo "Email Sending Failed";
                }    // header("location: Login.php");
             }
             else{
                ?>
                   <script>alert("Data Not Inserted")</script>
                <?php
             }

            }
            else{
                ?>
                <script>
                    alert("Password Are Not Match");
                </script>
                <?php
            }
            
        }
    }
?>

    <div id="parent">
        <div id="child">
            <div id="innerChild1"></div>
            <div id="innerChild2">
                <div id="heading">Registration Form</div>
                <img src="./style/Assets/signup.jpg" alt="" class="loginSignimg">
                <div id="formfield">
                     <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
                        <p><ion-icon name="person"></ion-icon><input type="text" name="name" id="" placeholder="Enter Your Name" required></p>
                       
                        <p><ion-icon name="mail"></ion-icon><input type="text" name="email" id="" placeholder="Enter Eamil Address" required></p>
                        <p><ion-icon name="call"></ion-icon><input type="text" name="number" id="" placeholder="Enter Phone Number" required></p>
                        <p><ion-icon name="lock-closed"></ion-icon><input type="password" name="password" id="" placeholder="Create Password" required></p>
                        <p><ion-icon name="lock-closed"></ion-icon><input type="password" name="cPassword" id="" placeholder="Re-enter Password" ></p>
                       

                        <p id="inpbtn"> <input type="submit" name="submit" id="btn" value="Create Account" ></p>
                     </form>
                     <h4>Have an Account? <span><a href="../HospitalManagementSystem/Login.php">Login</a></span></h4>
                </div>
                <div id="icon">
                    <div id="social">
                        <ion-icon name="logo-google" class="linkGF_img" id="google"></ion-icon>
                        <ion-icon name="logo-facebook" class="linkGF_img" id="facebook"></ion-icon>

                    </div>
                </div>
            </div>

        </div>
    </div>
  
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script>
     const btnClick = document.getElementById('btn');

     btnClick.onclick=()=>{
        window.location.replace('otp.php');
     }
  </script>
</body>
</html>