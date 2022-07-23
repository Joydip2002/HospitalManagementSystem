<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superadmin Login</title>
    <style>
        html{
            font-size:62.5%;
            background-image: linear-gradient(to right,yellow,brown);
        }
        #p{
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
        }
        #c{
            height:55rem;
            width:90rem;
            /* background-color: aqua; */
            display: flex;
            flex-direction: column;
            justify-content:center;
            align-items: center;
           

        }
        #innerc{
            height: 10rem;
            width: 50rem;
            background-image: url(../HospitalManagementSystem/style/Assets/admin.png);
            margin:1rem;
            background-size: 30rem;
            background-repeat: no-repeat;
            animation: animate 2s linear infinite;
            animation-direction: alternate;
        }
        @keyframes animate {
            0%{
                transform: translateX(15rem);
            }
            
            
        }
        #Loginform{
            height: 40rem;
            width: 30rem;
            background-color: plum;
            border: .5rem solid black;
            border-radius: 5rem;
            margin:1rem;
            display: flex;
            flex-direction: column;
            justify-content:center;
            justify-content: space-evenly;
            align-items: center;
        }
        input{
            padding: 1rem;
            outline: none;
            border-top:none;
            border-left:none;
            border-right: none;
            background-color: plum;
           
        }
      input[type="submit"]{
        width:17.5rem;
        margin-left: 1.5rem;
        border:none;
        cursor:pointer;
       }
       input[type="submit"]:hover{
        background-color: green;
       }
       h2{
        font-size: 2.5rem;
        color: brown;
        font-weight: 700;
       }
       ion-icon{
       font-size: 1.5rem;
       }
       #image{
        height:8rem;
        width:8rem;
        background-color: aqua;
        border-radius: 5rem;
        background-image: url(../HospitalManagementSystem/style/Assets/admin1.png);
        background-size: cover;
       }
        
    </style>
</head>
<body>
    <div id="p">
        <div id="c">
           <div id="innerc"></div>
           <div id="Loginform">
            <h2>Admin Login Form</h2>
            <?php
             $conn = mysqli_connect('localhost','root','','projectdatabase');

             if(isset($_POST['submit'])){
                $email = $_POST['email'];
                $password = $_POST['password'];

                $query = "SELECT * FROM admin WHERE email ='$email'";
                $res = mysqli_query($conn,$query);

                $emailCount = mysqli_num_rows($res);
                if($emailCount){
                    $pass = mysqli_fetch_array($res);
                    $dbPass = $pass['password'];
                    $_SESSION['adminname'] = $pass['name'];

                    $passwordVerify = password_verify($password,$dbPass);

                    if($passwordVerify){
                        ?>
                        <script>
                            alert("Login SuccessFull")
                          location.replace("AdminPage.php");
                        </script>

                          <?php

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
                        alert("Invalid Email!")
                    </script>
                      <?php
                }
             }
             mysqli_close($conn);
            ?>
            <div id="image"></div>
           <form method="post">
           <p> <ion-icon name="mail"></ion-icon><input type="email" name="email" placeholder="Enter Email"/></p>
           <p><ion-icon name="lock-closed"></ion-icon> <input type="password" name="password" placeholder="Enter Password"/></p>
           <p><input type="submit" name="submit" value="Login"></p>
           </form>
           </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>