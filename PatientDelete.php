<?php

session_start();
if(!(isset($_SESSION['adminname']) || isset($_SESSION['name']))){
    header('location:Adminlogin.php');
}
$conn = mysqli_connect('localhost','root','','projectdatabase');

$patientId = $_GET['id'];

$query = "DELETE FROM appointment  WHERE id ='$patientId'";

$res = mysqli_query($conn,$query);

if($res){
    ?>
   <script>
    alert("Delete Successfull");
    location.replace('PatientList.php');
   </script>

<?php
}
else{
    ?>
   <script>
    alert("Delete Un-Successfull");
   </script>

<?php
}


?>