<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    html {
        font-size: 62.5%;
        background-image: url(./style/Assets/dragon-scales.png);
    }

    #P { 
      margin: 2rem 0rem;
    }

    #C {

        margin: 2rem;
        height: 20rem;
        background-color:violet;
         display: flex;
        justify-content: space-evenly;
        border-radius: 5rem;
    }

    #image {
        margin-top: 1rem;
        background-image: url(./style/Assets/doctor.jpg);
        background-size: cover;
        width: 18rem;
        height: 18rem;
        /* background-color: rgb(113, 82, 255); */
        border-radius: 15rem;
    }

    #details {
        width: 40rem;
        height: 20rem;
        /* background-color: rgb(113, 82, 255); */
    }

    #time_Day {
        width: 18rem;
        height: 20rem;
        /* background-color: rgb(26, 197, 40); */
    }

    #dname {
        text-align: center;
        background-color: yellowgreen;
    }
    #dtails{
        margin-left: 2rem;
    }

    #About {
        margin: 0 2rem;
        font-size: 1.5rem;
    }

    h2 {
        font-size: 2.5rem;
    }

    h3 {
      
        font-size: 1.9rem;
    }
    ion-icon{
        font-size: 5rem;
        color: rgba(0, 30, 255, 0.5);
    }
    #time{
        display: flex;
    }
    #Day{
        display: flex;
    }
    #time_Day{
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
    }
    span{
        
        margin-top: 2rem;
        font-size: 1.2rem;
        font-weight: 700;
    }
    button{
        width: 15rem;
        height: 3rem;
        border-radius: 5rem;
        cursor:pointer;
    }
    button:hover{
        background-color: cornflowerblue;
        cursor:pointer;
    }
</style>

<body>
    <div id="P">
        <?php
          $conn = mysqli_connect('localhost','root','','projectdatabase');
          $sqlQuery = "SELECT * FROM doctor";
          
          $res = mysqli_query($conn,$sqlQuery);
          if($res != ""){
            while($row = mysqli_fetch_array($res)){
              ?>
              <div id="C">
              <div id="image"></div>
              <div id="details">
                  <div id="dname">
                      <h2><?php echo $row['name']; ?></h2>
                  </div>
                  <div id="About">
                  <?php echo $row['aboutdoctor']; ?>
                  </div>
                  <h3 id="dtails">Specialist: <?php echo $row['specialist']; ?> (<?php echo $row['degree']; ?>)</h3>
                  
  
              </div>
              <div id="time_Day">
                  <div id="time">
                      <ion-icon name="time"></ion-icon>
                      <h3><?php echo $row['worktime']; ?></h3>
                  </div>
                  <div id="Day">
                      <ion-icon name="calendar"></ion-icon>
                      <span><?php echo $row['workday']; ?></span>
                  </div>
                  <div id="Book"><a href="../HospitalManagementSystem/Appoinments.php?name=<?php echo $row['name']; ?>"><button type="">Book Appoinment</button></a> </div>
              </div>
          </div>
  
              <?php
            }
          }

        ?>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>