<?php
session_start();
if(!isset($_SESSION['name'])){
    header('location:SuperAdminLogin.php');
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
              background-image: linear-gradient(to top, violet,white);
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
            button {
                background-color: transparent;
                font-weight: 500;
                color: white;
                outline: none;
                border:none;
                margin-top: 14rem;
            }
            button:hover{
             
                background-color: yellowgreen;
                color: black;
                border: none;
                border-radius: 1rem;
                cursor:pointer;
            }
            button a{
                font-weight: 600;
                color:white;
            }
            
            h3{
                font-size: 2rem;
                color: white;
            }
            .userinfo{
                font-size: 2rem;
                color: yellow;
       
                transition: 5s;
                animation: animate 1s linear infinite;
                animation-direction: alternate-reverse;
            }
            @keyframes animate {
                0%{
                    transform:translateX(-3rem);
                }
            }
           
        </style>
    </head>
    <body>
        <div id="p">
            <div id="c">
                 <div id="adminpanel">
                    <div id="pofilepic"></div>
                    <h3>SUPER ADMIN</h3>
                    <div id="About">
                        <form action="">
                          <p class="userinfo"><?php echo $_SESSION['name'] ?></p>
                            <!-- <p><input type="text" name="" id="" placeholder=" Showing Mobile Number"></p> -->
                            <p class="userinfoemail"><?php echo $_SESSION['email'] ?></p>
                             <p> <button><a href="../HospitalManagementSystem/Logout.php">LOG OUT</a></button></p>
                        </form>
                    </div>
                 </div>
                 <div id="adminOperation">
                    <div id="adddoctor" class="operations">
                        <a href="../HospitalManagementSystem/AddDoctorsPage.php"><button>ADD DOCTOR</button></a>
                    </div>
                    <div id="deleteDoctor" class="operations">
                        <a href="../HospitalManagementSystem/DoctorList.php"><button>DELETE/UPDATE DOCTOR</button></a>
                    </div>
                   
                    <div id="patientdelete" class="operations">
                    <a href="../HospitalManagementSystem/PatientList.php""> <button class="btn">UPDATE/DELETE PATIENT</button></a>
                    </div>
                    <div id="patientdelete" class="operations">
                        <a href="../HospitalManagementSystem/AddAdmin.php"><button>ADD ADMIN</button></a>
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