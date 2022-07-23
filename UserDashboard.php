<?php
session_start();
if(!(isset($_SESSION['uName']) && isset($_SESSION['mobileno'])&& isset($_SESSION['email']))){
    header('location: Login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
 <style>
    
    html{
    font-size:62.5%;
    font-family: sans-serif;
}
#p{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
#c{
    height: 50rem;
    width:100rem;
    background-color: aquamarine;
    display: flex;
    justify-content: center;
    align-items: center;
    justify-content: space-between;
}
#innerc1{
    height: 50rem;
    width: 30rem;
    background-color: bisque;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    justify-content: space-evenly;
}
#innerc2{
    height: 30rem;
    width: 60rem;
    background-color: bisque;
    
}
#innerc2 fieldset{
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
}
legend{
    font-size: 2rem;
    font-weight: 700;
  
}
p{
    font-size: 1.5rem;
    background-color:black;
    color: white;
}
#image{
    height: 10rem;
    width: 10rem;
    background-image: url(./style/Assets/superadmin.png);
    border-radius: 5rem;
    background-size: cover;
}
span{
    font-size: 1.5rem;
    font-weight: bold;
}
 </style>
<body>
    <div id="p">
        <div id="c">
            <div id="innerc1">
                <div id="image"></div>
                 <span>Name: <?php echo $_SESSION['uName'];?> </span>
                 <span>Mobile No: <?php echo $_SESSION['mobileno'];?></span>
                 <span>Email: <?php echo $_SESSION['email'];?></span>
                  
            </div>
            <div id="innerc2">
                <fieldset>
                    <legend>Account Details</legend>
                    <p>Name:<?php echo $_SESSION['uName'];?></p>
                    <p>Mobile No: <?php echo $_SESSION['mobileno'];?></p>
                    <p>Email: <?php echo $_SESSION['email'];?></p>
                </fieldset>
            </div>
        </div>
    </div>
</body>
</html>