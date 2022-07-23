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
    <title>Patient's List</title>
    <style>
    body{
      display: flex;    
      justify-content: center;
    }
    html{
        font-size: 62.5%;
    }
    #table{
        
        background-color:aqua;
    }
    thead tr th{
        font-size: 2.5rem;
    }
    tbody tr td{
        font-size: 2rem;
        text-align: center;
    }
  ion-icon{
         
         font-size: 3rem;
         font-weight: 800;
    }
    #delete{
        color: red;
    }
    #edit{
        color: green ;
    }
    #dl{
        font-size: 2rem;
        color: blue;
        text-align: center;
    }
    </style>
</head>
<body>
    <div id="table">

        <table border="1px">
            <h3 id="dl">Patient's List</h3>
            <thead>
                 <tr>
                    
                    <th>Id</th>
                    <th>Name</th>
                   
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Mobile No</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Assign Doctor</th>
                    <th colspan="2">Operations</th>
</tr>
            </thead>
            <tbody>
                <?php

                  $conn = mysqli_connect('localhost','root','','projectdatabase');

                  $query = "SELECT * FROM appointment";

                  $res = mysqli_query($conn,$query);

                  $showData = mysqli_fetch_array($res);
             if($res != ""){
                  while($showData = mysqli_fetch_array($res)){
                    ?>
                       
                <tr>
                    <td><?php echo $showData['id']; ?></td>
                    <td><?php echo $showData['name']; ?></td>
                    <td><?php echo $showData['email'] ?></td>
                    <td><?php echo $showData['dob']; ?></td>
                    <td><?php echo $showData['number']; ?></td>
                    <td><?php echo $showData['age']; ?></td>
                    <td><?php echo $showData['sex']; ?></td>
                    <td><?php echo $showData['doctorname']; ?></td>
                    
                    <td><a href="../HospitalManagementSystem/PatientUpdate.php?id=<?php echo $showData['id']; ?>"><ion-icon  id="edit" name="create-outline"></ion-icon></a></td>
                    <td><a href=""><a href="../HospitalManagementSystem/PatientDelete.php?id=<?php echo $showData['id']; ?>"><ion-icon id="delete" name="trash-outline"></a></ion-icon></a></td>
                </tr>
                    <?php
                  }
                }
                ?>

            </tbody>
        </table>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>