<?php
session_start();

if(!(isset($_SESSION['uName'])||isset ($_SESSION['adminname']) || isset ($_SESSION['name']))){
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
                        $patientId = $_GET['id'];
                        $idCheckQuery = "SELECT *FROM appointment WHERE id = '$patientId'";
                        $Res = mysqli_query($conn,$idCheckQuery);
                        $Rows = mysqli_fetch_array($Res);
                        if(isset($_POST['submit'])){
                            
                            $dname = $_POST['dname'];
                            $name = $_POST['name'];       
                            $email = $_POST['email'];
                            $dob = $_POST['dob'];
                            $number = $_POST['number'];
                            $age =$_POST['age'];
                            $sex = $_POST['gender'];
                            
                            $updateDetails ="UPDATE appointment SET doctorname = '$dname',name = '$name', email ='$email', dob = '$dob', number ='$number', age ='$age', sex ='$sex' WHERE id = '$patientId'";
                     
                            $res2=mysqli_query($conn,$updateDetails);
                            if($res2){
                                ?>
                                 <script>
                                    alert("Data Upadate Sucessfully");
                                    location.replace('PatientList.php');
                                 </script>
                                 <?php
                            }
                            else{?>
                    
                                <script>
                                    alert("Data update Un-Sucessfully");
                    
                                 </script>
                                 <?php
                            }
                           
                          
                           
                        }

                    ?>
                    <p><input type="text" name="dname" value="<?php echo $Rows['doctorname'];?>" placeholder="Enter Doctor's Name" required></p>
                    <p><input type="text" name="name" value="<?php echo $Rows['name'];?>" id="" placeholder="Enter Your Name" required></p>
                    <p><input type="email" name="email"  value="<?php echo $Rows['email'];?>" id="" placeholder="Enter Email id" required></p>
                    <p>Birth Date *<br><input type="date"  value="<?php echo $Rows['dob'];?>" name="dob" id="" required></p>
                   <p> <input type="number" name="number"  value="<?php echo $Rows['number'];?>" id="" placeholder="Enter Phone Number" required ></p>
                  <p> <input type="number" name="age" id=""  value="<?php echo $Rows['age'];?>" placeholder="Enter Your Age" required></p>
                  <p>Sex:&nbsp;Male<input type="radio" name="gender" id="gender" required>
                    Female<input type="radio" name="gender" id="gender"   required>
                    Others<input type="radio" name="gender" id="gender"   required></p>
                 
            
                  <input type="submit" name="submit" id="submitBtn"> 
    
                </form>
            </div>
        </div>
    </div>
</body>

</html>