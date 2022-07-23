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
    <?php include 'appoinmentLink.php' ?>
   
</head>

<body>
    <div id="p">
        <div id="c">
            <div id="Inner">
                <form method="post">
                    <h2>Reset Password Form</h2>
                    <?php
                     $conn = mysqli_connect('localhost','root','','projectdatabase');
                    
                     if(isset($_POST['submit'])){
                        $email = $_POST['email'];

                        $FPquery = "SELECT * FROM signup WHERE email = '$email'";
                        
                        $res = mysqli_query($conn,$FPquery);
                        
                         $emailCount = mysqli_num_rows($res);
                        if( $emailCount){
                            $userData = mysqli_fetch_array($res);
                            $username = $userData['name'];
                            $token = $userData['token'];

                            $subject = "Reset Password";
                            $body ="Hi, $username Click Here to Reset Password.
                            http://localhost/learnPhp/HospitalManagementSystem/UpdatePassword.php?token=$token";
                            $headers ="From: joydipmanna2002@gmail.com";
                            if(mail($email,$subject,$body,$headers)){
                                $_SESSION['massage'] = "Check Your Email to Reset Password $email";
                                header('location:Login.php');
                            }
                            else{
                              ?>
                                <script>
                                    alert("Email Send Failed!");
                                </script>
                              <?php
                            }
                            
                        }
                        else{
                            echo"Invalid Email Id";
                        }
                     }
                     
                    ?>
                   
                    <p><input type="email" name="email" id="" placeholder="Enter Email id" required></p>
 
                    <input type="submit" name="submit" id="submitBtn">
    
                </form>
            </div>
        </div>
    </div>
</body>

</html>