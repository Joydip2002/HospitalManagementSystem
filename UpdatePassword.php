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
                    <h2>Update Password Form</h2>
                    <?php
                        $conn = mysqli_connect('localhost','root','','projectdatabase');
                    
                        if(isset($_POST['submit'])){
                            
                            $password = mysqli_escape_string($conn, $_POST['password']);
                            $cpassword = mysqli_escape_string($conn,$_POST['cpassword']) ;

                            $encryptPass =password_hash($password,PASSWORD_BCRYPT);
                            $encryptPass1 = password_hash($cpassword,PASSWORD_BCRYPT);
                            if(isset($_GET['token'])){
                                $token = $_GET['token'];
                                if($password === $cpassword){
                                    $updateStatus = "UPDATE signup SET password = '$encryptPass' WHERE token = '$token' ";
                                    $res = mysqli_query($conn,$updateStatus);
                                
                                    if($res){
                                        if(isset($_SESSION['massage'])){
                                            $_SESSION['massage'] = "Password Reset Successfully";
                                            header('location:Login.php');
                                        }
                                        else{
                                            $_SESSION['massage'] = "Password Not Reset Successfully";
                                            header('location:Login.php');
                                        }
                                    }
                                }
                            
                               
                                else{
                                    $_SESSION['massage'] = "Password Not Match";
                                    header('location:Login.php');
                                }
                            }
                        }
                

                    ?>
                    <p><input type="password" name="password" id="" placeholder="Enter Password" required></p>
                    <p><input type="password" name="cpassword" id="" placeholder="Re-Enter Password" required></p>
                    
                 
            
                    <input type="submit" name="submit" id="submitBtn">
    
                </form>
            </div>
        </div>
    </div>
</body>

</html>