<?php
session_start();
if(!(isset($_SESSION['adminname']) || isset($_SESSION['name']))){
    header('location:Adminlogin.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <style>
        * {
            font-size: 62.5%;
            font-family: sans-serif;
            background-image: url(./style/Assets/dragon-scales.png);
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
        input[type="time"] {
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
            color: rgb(232, 50, 50);
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
                    $specialist = $_POST['specialist'];
                    $age = $_POST['age'];
                    $degree = $_POST['degree'];
                    $time = $_POST['time'];
                    $day = $_POST['days'];
                    $abdoctor = $_POST['AbDoctor'];

                   $emailSelect = "SELECT * FROM doctor WHERE email = '$email'";
                   $res = mysqli_query($conn,$emailSelect);
                    
                   $emailCount = mysqli_num_rows($res);
                        if($emailCount>0){
                            ?>
                            <script>alert("Email Already Exists")</script>
                            <?php
                        }
                        else{
                            $queryAddDoctor = "INSERT INTO doctor(name,specialist,age,degree,worktime,email,workday,aboutdoctor)VALUES('$name','$specialist','$age','$degree','$time','$email','$day','$abdoctor')";
                            $res1 = mysqli_query($conn,$queryAddDoctor);
                            if($res1){
                                ?>
                                  <script>
                                    alert("Add Sucessfull");
                                    // window.location.replace('http://localhost/learnPhp/HospitalManagementSystem/Index.php');
                                </script>
                                <?php
                            }
                            else{
                                ?>
                                  <script>
                                    alert("Add Unscessfull");
                                </script>
                                <?php
                            }
                        }
                }  
            ?>
            <form id="doctorFrom" method="post">
                <input type="text" name="name" value="" placeholder="Enter Doctor's Name">
                <input type="email" name="email" value="" placeholder="Enter Doctor's Email">
                <input type="text" name="specialist" id="" placeholder="Specialist">
                <input type="number" name="age" id="" placeholder="Doctor's Age">
                <input type="text" name="degree" id="" placeholder="Doctor Degree">
                <input type="time" name="time" id="" placeholder="Working Time">
                <input type="text" name="days" id="" placeholder="Working Days">
                <input type="text" name="AbDoctor" id="" placeholder="About Doctor">
                <input type="submit" name="submit" id="submit" value="Add Doctor">
            </form>
        </div>
    </div>
</body>

</html>