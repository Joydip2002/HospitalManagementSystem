<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            font-size: 62.5%;
            padding: 0;
            margin: 0;
            font-family: sans-serif;
        }
        #P{
         display: flex;
         justify-content: center;
         align-items: center;
         height: 60vh;
          
        }
        #C{
           background-image: linear-gradient(to bottom,rgb(153, 83, 191),green);
        }
         input{
            padding: 1.3rem 5rem;

        }
        input[type="text"]{
            font-size: 2rem;
            border-left: 0;
            border-right: 0;
            border-top:0;
            outline: none;
        }
        h3{
            font-size: 2rem;
            transition: 5s;
            animation: animate 5s linear infinite;
            animation-direction: alternate;
        }
        @keyframes animate {
            0%{
                transform: translateX(10rem);
            }
        }
        #form{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        input[type="submit"]{
            font-size: 2rem;
            
        }
        #Searchbtn{
           
            text-align: center;
            cursor: pointer;
        }
        legend{
            margin-left:3rem;
        }
        fieldset{
            background-color: blueviolet;
        }
        #P{
         background-image: url(./style/Assets/hms.jpg);
         background-repeat: no-repeat;
         background-size: cover;
        }
        #resultBox{
            background-color: bisque;
            
        }
        th,td{
            font-size: 2rem;
            padding: 1rem;
            margin-left:5rem;
        }
        table{
            margin: 0rem auto;
            background-color:violet;
        }
        #mail{
            color:red;
            font-weight: 700;
            font-style:italic;
        }
        #Searchbtn:hover{
            background-color: lightgreen;
        }
       
         
    </style>
</head>
<body>
     <div id="P">
        <div id="C">
             
                <legend><h3>Patient Information</h3></legend>
                <form action="" id="form" method="post">

                <input type="text" name="name" id="" placeholder="Enter Patient Name" required>
                    <input type="text" name="email" id="" placeholder="Enter Register Mail ID" required >
                    
                     <input type="submit" name="submit" id="Searchbtn" value="Search">
                </form>
            
        </div>
        
     </div>
     <div id="resultBox">
        <?php
          $conn = mysqli_connect('localhost','root','','projectdatabase');

          if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $searchQuery = "SELECT * FROM appointment WHERE email = '$email' And name = '$name'"; 
            $res = mysqli_query($conn,$searchQuery);

            if($res){
                if ($row = mysqli_fetch_array($res)) {
               
                    ?>
                 <table border="2rem">
        <thead>
            <tr>
                <th>Name </th>
                <th>Mobile_Number</th>
                <th>Email</th>
                <th>Date-of-Birth</th>
                <th>Age</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <tr>       
                        <td><?php echo $row['name']; ?> </td>
                        <td><?php echo $row['number']; ?> </td>
                        <td id="mail"><?php echo $row['email']; ?> </td>
                        <td><?php echo $row['dob']; ?> </td>
                        <td><?php echo $row['age']; ?> </td>
                        <td><?php echo $row['sex']; ?> </td>
                         
             </tr>
        </tbody>
         
        <tfoot>
            <th colspan="6">Hospital ManageMent System</th>
        </tfoot>
    </table>

            <?php
                }
                else{
                    ?>
                    <script>
                        alert("Please Provide Correct Information");
                    </script>
                    <?php
                }
            }
           
          }

        ?>
       
     </div>
     
</body>
</html>