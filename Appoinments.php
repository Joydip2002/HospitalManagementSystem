<?php
session_start();

if(!isset($_SESSION['uName'])){
    header('location:Login.php');

}
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
                    <h2>Appoinment Form</h2>
                    <?php
                        $conn = mysqli_connect('localhost','root','','projectdatabase');
                        if($conn){
                            echo "Connection Suucessfull";
                        }
                        else{
                            echo"Connection Failed!";
                        }
                        if(isset($_POST['submit'])){
                            
                            $dname = $_POST['dname'];
                            $name = $_POST['name'];
                         
                            $email = $_POST['email'];
                            $dob = $_POST['dob'];
                            $number = $_POST['number'];
                            $age =$_POST['age'];
                            $sex = $_POST['gender'];

                           
                            $emailCheckQuery = "SELECT *FROM appointment WHERE email = '$email'";
                            $emailRes = mysqli_query($conn,$emailCheckQuery);
                            $emailRows = mysqli_num_rows($emailRes);
                            if($emailRows > 0){
                                ?>
                                <script>
                                    alert("Email Already Exists");
                                </script>
                                <?php
                            }
                            else{
                                $InsertData ="INSERT INTO appointment(name,email,dob,number,age,sex,doctorname) VALUES('$name','$email','$dob','$number','$age','$sex','$dname')";

                                $res = mysqli_query($conn,$InsertData);
                                    if($res){
                                        ?>
                                        <script>
                                            alert("Appoinment From Submitted😃😃");
                                            window.location.replace('http://localhost/learnPhp/HospitalManagementSystem/Index.php');
                                        </script>
                                        <?php
                                         $subject = "Appoinment";
                                         $body ="Hi, $name Your form Sucessfully Submitted.Your Appoinment Time and Date Notify Later..Your Doctor Name is $dname";
                                         $headers ="From: joydipmanna2002@gmail.com";

                                         if(mail($email,$subject,$body,$headers,)){
                                            echo "Email Successfully Sent to $email...";
                                        }
                                        else{
                                            echo "Email Sending Failed";
                                        }
                                    }
                                    else{
                                        ?>
                                        <script>
                                            alert("Appoinment From not Submitted😓😓");
                                        </script>
                                        <?php
                                    }
                            }
                        }

                    ?>
                    <p><input type="text" name="dname" value="<?php echo $_GET['name'];?>" placeholder="Enter Doctor's Name" required></p>
                    <p><input type="text" name="name" id="" placeholder="Enter Your Name" required></p>
                    <p><input type="email" name="email" id="" placeholder="Enter Email id" required></p>
                    <p>Birth Date *<br><input type="date" name="dob" id="" required></p>
                   <p> <input type="number" name="number" id="" placeholder="Enter Phone Number" required ></p>
                  <p> <input type="number" name="age" id="" placeholder="Enter Your Age" required></p>
                  <p>Sex:&nbsp;Male<input type="radio" name="gender" id="gender" value="male" required>
                    Female<input type="radio" name="gender" id="gender" value="female" required>
                    Others<input type="radio" name="gender" id="gender" value="others" required></p>
                 
            
                  <input type="submit" name="submit" id="submitBtn"> 
    
                </form>
            </div>
        </div>
    </div>
</body>

</html>