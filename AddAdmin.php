<?php
session_start();
if(!isset($_SESSION['name'])){
    header('location:SuperAdminLogin.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <style>
        * {
            font-size: 62.5%;
            font-family: sans-serif;
            background-image: linear-gradient(to bottom, white, orange);
            background-repeat: no-repeat;
            background-size: cover;
        }

        #p {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

        }

        #c {
            width: 35rem;
            height: 45rem;
            background-color: transparent;
            box-shadow: -14px 0px 400px 26px rgba(0, 0, 0, 0.51) inset;
            -webkit-box-shadow: -14px 0px 400px 26px rgba(0, 0, 0, 0.51) inset;
            -moz-box-shadow: -14px 0px 400px 26px rgba(0, 0, 0, 0.51) inset;
            display: grid;
            place-items: center;
            box-shadow: inset 0 0 rgb(177, 177, 177);

        }

        #inner {
            height: 10rem;
            width: 10rem;
            border-radius: 15rem;
            background-image: url(./style/Assets/doctor.jpg);
            background-size: cover;
        }

        form {

            display: flex;
            flex-direction: column;

        }

        input {
            width: 25rem;
            height: 2rem;
            margin: 0.6rem;
            border-radius: 1rem;
            border-bottom: 5px solid aquamarine;
            border-top: none;
            border-left: none;
            border-right: none;
            outline: none;
        }

        input[type="text"] {
            font-size: 1.5rem;
            color: rgb(206, 255, 12);
            font-weight:700;
        }
        input[type="email"] {
            font-size: 1.5rem;
            color: rgb(206, 255, 12);
            font-weight:700;
        }
        input:is([type="password"],[type="cpassword"]) {
            font-size: 1.5rem;
            color: rgb(206, 255, 12);
            font-weight:700;
        }

        input[type="number"] {
            font-size: 1.5rem;
            color: red;
            font-weight:700;
        }

        input[type="submit"]{
            font-size: 1.5rem;
            height: 3rem;
            width: 25.5rem;
            font-weight:700;

        }

        #submit {
            background-color: rgb(177, 177, 177);
            border: none;
            cursor: pointer;
        }

        #submit:hover {
            color: green;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="p">
        <div id="c">
            <div id="inner"></div>
            <?php
                $conn = mysqli_connect('localhost','root','','projectdatabase');
                if(isset($_POST['submit'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $mobile = $_POST['mobile'];
                    $password = $_POST['password'];
                    $cpassword = $_POST['cpassword'];
                    
                    $encryptPass = password_hash($password,PASSWORD_BCRYPT);

                   $emailSelect = "SELECT * FROM admin WHERE email = '$email'";
                   $res = mysqli_query($conn,$emailSelect);
                    
                   $emailCount = mysqli_num_rows($res);
                        if($emailCount>0){
                            ?>
                            <script>alert("Email Already Exists")</script>
                            <?php
                        }
                        else{

                            if($password === $cpassword){
                            $queryAddDoctor = "INSERT INTO admin (name,mobile,email,password)VALUES('$name','$mobile','$email','$encryptPass')";
                            $res1 = mysqli_query($conn,$queryAddDoctor);
                            
                            if($res){
                                $subject="Admin Approved";
                                $body="Hi, $name , Now You Are Admin. Your Password is $password.";
                                $headers="From: joydipmanna2002@gmail.com";
                                if(mail($email,$subject,$body,$headers)){
                                    echo "Mail Sent Successfully";
                                }
                                else{
                                    echo "Mail Not Sent ";
                                }
                                ?>
                                  <script>
                                    alert("Add Successfull");
                                </script>
                                <?php
                            }
                            else{
                                ?>
                                  <script>
                                    alert("Add Unsuccessfull");
                                </script>
                                <?php
                            }
                          }
                          else{
                            ?>
                              <script>
                                alert("Password Not Match");
                            </script>
                            <?php
                        } 
                        }

                }  
                mysqli_close($conn);
            ?>
            <form id="doctorFrom" method="post">
                <input type="text" name="name" value="" placeholder="Enter Name" required>
                <input type="email" name="email" value="" placeholder="Enter Email" required>
                <input type="number" name="mobile" id="" placeholder="Enter Mobile No" required>
                <input type="password" name="password" id="" placeholder="Password" required>
                <input type="password" name="cpassword" id="" placeholder="Re-Enter Password" required>
                <input type="submit" name="submit" id="submit" value="Add Admin">
            </form>
        </div>
    </div>
</body>

</html>