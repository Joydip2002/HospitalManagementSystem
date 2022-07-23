<?php
session_start();
if(!isset($_SESSION['adminname'])){
    header('location:Adminlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <style>
            html{
              font-size:62.5%;
              font-family: sans-serif;
              background-image: linear-gradient(to top, black,white);
            }
            #p{
                display: flex;
                justify-content:center;
                align-items:center;
                height: 100vh;
            }
            #c{
                height: 55rem;
                width: 120rem;
                /* background-color: aqua; */
             
                display: flex;
                flex-direction: row;
                align-items: center;
            }
            #adminpanel{
                margin-top: 2rem;
                margin-left: 2rem;
                height: 50rem;
                width: 30rem;
                border-radius: 5rem;
                background-color: blueviolet;
                display: flex;
                justify-content: center;
                flex-direction: column;
                margin: 2rem;
            align-items: center;
            }
            #pofilepic{
                margin-top: 2rem;
                height: 15rem;
                width: 15rem;
                border-radius: 8rem;
           
                flex-direction: row;
            background-image: url(./style/Assets/doctor.jpg);
            background-size: cover;
            }
            #About{
                height: 30rem;
                width: 25rem;
       
            }
            form{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;

            }
            #adminOperation{
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items:center;
                justify-content: space-evenly;
                height: 45rem;
                width: 80rem;
                background-color: coral;
            }
            .operations{
                height: 10rem;
                width: 20rem;
                background-color: black;
                margin: 0.5rem;
            }
            .operations{
                background-image: url(./style/Assets/download.png);
  
                background-repeat: no-repeat;
                display: flex;
                justify-content: center;
                align-items: center;
                 

            }
            #logoutBtn {
                background-color: transparent;
                color: white;
                outline: none;
                border: none;
                margin-top: 14rem
            }
            #logoutBtn a:hover{
          
                
                color: orangered;
                border: none;
                border-radius: 1rem;
                cursor:pointer;
            }
            #logoutBtn a{
                text-decoration: none;
                color:white;
                font-weight: 700;
                font-size: 1rem;
                
            }
            h3{
                font-size: 2rem;
            }
           #username{
            font-size: 1.9rem;
            font-weight: 700;
            color:white;
            animation: animate 3s linear infinite;
            animation-direction: alternate;
           }
           @keyframes animate {
            
            0%{
                transform: translateX(-3rem);
            }
        }
        .btn{
            margin-top:14rem;
            border: none;
            border-radius: 5rem;
            
        }
        .btn a{
            text-decoration: none;
        }
        .btn:hover{
            background-color:greenyellow;
            cursor: pointer;
        }
        </style>
    </head>
    <body>
        <div id="p">
            <div id="c">
                 <div id="adminpanel">
                    <div id="pofilepic"></div>
                    <h3>ADMIN</h3>
                    <div id="About">
                        <form action="">
                            <p id="username"><?php echo $_SESSION['adminname'];  ?></p>
                            
                             <p id="logoutBtn"><a href="../HospitalManagementSystem/Logout.php"> LOGOUT </a></p>
                        </form>
                    </div>
                 </div>
                 <div id="adminOperation">
                    <div id="adddoctor" class="operations">
                        <button class="btn"><a href="../HospitalManagementSystem/AddDoctorsPage.php">ADD DOCTOR</a></button>
                    </div>
                    <div id="deleteDoctor" class="operations">
                        <a href="../HospitalManagementSystem/DoctorList.php"><button class="btn">DELETE/UPDATE DOCTOR</button></a>
                    </div>
                    
                    <div id="patientdelete" class="operations">
                       <a href="../HospitalManagementSystem/PatientList.php""> <button class="btn">UPDATE/DELETE PATIENT</button></a>
                    </div>
                 </div>
            </div>
        </div>

        <!-- <script>
            const adddoctor = document.getElementById('adddoctor');
            const hoverEffect=()=>{
                document.querySelector('.operations').style.hover = 'Add Doctor';
            }
             adddoctor.addEventListener('hover',hoverEffect);
        </script> -->
    </body>
</html>