<?php
 session_start();

 $conn = mysqli_connect('localhost','root','','projectdatabase');

 if(isset($_GET['token'])){
    $token = $_GET['token'];

    $updateStatus = "UPDATE signup SET status = 'Active' WHERE token = '$token' ";
    $res = mysqli_query($conn,$updateStatus);

    if($res){
        if(isset($_SESSION['massage'])){
            $_SESSION['massage'] = "Account Update Successfully";
            header('location:Login.php');
        }
        else{
            $_SESSION['massage'] = "You are Logged Out";
            header('location:Login.php');
        }
    }
    else{
        $_SESSION['massage'] = "Account Not Updated";
        header('location:Signup.php');
    }

 }

?>