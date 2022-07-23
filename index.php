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
    <?php include'homepageLink.php' ?>  
     <style>
     span{
        color:white;
        font-size:1.5rem;
     }
     label ion-icon{
      position:sticky;
      display: flex;
      top:0;
     }
     </style>
   
</head>

<body>
    <nav id="navbar">
    
    <input type="checkbox" name="" id="click">
        <label for="click" id="menuicon"><ion-icon name="menu" ></ion-icon></label>

        <div id="imageDiv">
            <img src="./style/Assets/download.png" alt="">
        </div>
        <span id="user"><?php echo "Hello! ".$_SESSION['uName'] ?></span>
          
       
         
        <div id="components">
            <label for="" class="navElem"> <a href="../HospitalManagementSystem/Index.php" class="compoTag" class="compoTag">Home</a></label>
            <label for="" class="navElem"><a href="" class="compoTag">About</a></label>
            <label for="" class="navElem"><a href="" class="compoTag">Services</a></label>
            <label for="" class="navElem"><a href="" class="compoTag">Page</a></label>
           <!-- <span>Page</span> <select name="" id="">
            <option value="#">--Select--</option>
            <option value=""><a href="../HospitalManagementSystem/Login.php">Appointment</a></option>
            <option value="">Doctor</option>
            <option value="">Admin Login</option>
            <option value="">Superadmin Login</option>
           </select> -->
            <label for="" class="navElem"><a href="../HospitalManagementSystem/ContactPage.php" class="compoTag">Contact</a></label>
            <?php
            if(!isset($_SESSION['uName'])){
                ?>
                <label for="" ><a href="../HospitalManagementSystem/Login.php" class="compoTag">Login/Signup</a></label>
                <?php
            }
            else{
                ?>
                <label for="" ><a href="../HospitalManagementSystem/Logout.php" class="compoTag">Logout</a></label>
                <?php
            }
            ?>
         

        </div>
    </nav>
     
    <main id="mainContainer">  
        <!-- <div>
        <img src="./style/Assets/homepage.jpg" alt="">
        </div> -->
           <div id="homeImg">
                <div id="innerImg">
                     <div id="border">
                        <div class ="operation">
                           <div class="insideOp" id="appoinment">
                           </div>
                           <div>
                            <h2>Dashboard</h2>
                            <a href="../HospitalManagementSystem/UserDashboard.php"><button type="">Go To Dashboard</button></a>
                           </div>
                        </div>

                        <div class ="operation">
                        <div class="insideOp" id="doctors">
                          
                            </div>
                            <div>
                            <h2>Doctors</h2>
                            <a href="../HospitalManagementSystem/ShowDoctorPage.php"><button type="">Visit Doctors</button></a>
                            </div>
                           </div>
                           <div class ="operation" id="AppoinAnimate">
                           <div class="insideOp"
                           id="appoin">
                            
                            </div>
                            <div>
                            <h2>Appoinments</h2>
                            <a href="../HospitalManagementSystem/ShowDoctorPage.php"><button type="">Click Here</button></a>
                            </div>
                           </div>
                           <div class ="operation">
                           <div class="insideOp"
                           id="patient">
                            
                            </div>
                            <div>
                            <h2>Patients</h2>
                            <a href="../HospitalManagementSystem/Patient.php"><button type="">Click Here</button></a>
                            </div>
                           </div>
                           <div class ="operation">
                           <div class="insideOp"
                           id="diago">
                            
                            </div>
                            <div>
                            <h2>Diagonosis</h2>
                            <a href=""><button type="">Click Here</button></a>
                            </div>
                           </div>
                           <div class ="operation">
                           <div class="insideOp"
                           id="pres">
                            
                            </div>
                            <div>
                            <h2>Prescription</h2>
                            <a href=""><button type="">Click Here</button></a>
                            </div>
                           </div>
                           <div class ="operation">
                           <div class="insideOp"
                           id="medi">
                            
                            </div>
                            <div>
                            <h2>Medical Store</h2>
                            <a href=""><button type="">Visit Here</button></a>
                            </div>
                           </div>
                           <div class ="operation">
                           <div class="insideOp"
                           id="acc">
                            
                            </div>
                            <div>
                            <h2>Accounts</h2>
                            <a href=""><button type="">Click Here</button></a>
                            </div>
                           </div>
                           <div class ="operation">
                           <div class="insideOp"
                           id="reports">
                            
                            </div>
                            <div>
                            <h2>Reports</h2>
                            <a href=""><button type="">Click Here</button></a>
                            </div>
                           </div>
                     </div>
                </div>
           </div>
    </main>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- <script>
        const c = document.querySelector('.compoTag');
        Cclick=()=>{
            document.getElementsByTagName(lebel).style.color = "red";
        } 
        c.addEventListener('click',Cclick);
    </script> -->
</body>  

</html>