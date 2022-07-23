<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <title>Contact Page</title>
    <style>
        html {
            font-size: 62.5%;
            background-image: url(./style/Assets/contact1.png);
            offset: 0.5;
            background-size: cover;
            text-transform: uppercase;

        }

        #p {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        #c {

            width: 30rem;
            background-color: whitesmoke;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            box-shadow: 0 0 1.1rem rgba(33, 33, 33, 2);
        }

        span {
            font-size: 1.2rem;
            font-weight: 900;
        }

        h2 {
            font-size: 2rem;
            color: rgb(255, 87, 87);
            /* box-shadow: 0 0 1.1rem rgb(33, 33, 33,2); */
        }

        input {
            border-top: none;
            border-left: none;
            border-right: none;
            outline: none;
            padding: 1rem;
        }
        textarea{
            outline: none;
        }
        #submit {
            border: none;
            border-radius: .5rem;
            background-color: white;

        }

        #subtn {
            text-align: center;
        }

        #submit:hover {
            background-color: green;
        }
        #hline{
            height: .1rem;
             width: 100%;
            background-color: rgb(83, 83, 83);
        }
        form{
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <div id="p">
        <div id="c">
            <h2>Contact Form</h2>
            <?php

                $conn = mysqli_connect('localhost','root','','projectdatabase');
                if($conn){
                    echo "Connection Successfull";
                }
                else{
                    echo "Connection Unsuccessful";
                }

                if(isset($_POST['submit'])){
                    $email = $_POST['email'];
                    $subject = $_POST['subject'];
                    $comment = $_POST['comment'];

                    $queryemail = "SELECT * FROM contact WHERE email ='$email'";
                    $res = mysqli_query($conn,$queryemail);

                    $emailCount = mysqli_num_rows($res);

                    if($emailCount > 0){
                        ?>
                            <script>
                                alert("Email Already Exists");
                            </script>
                        <?php
                    }
                    else{
                        $query = "INSERT INTO contact(email,subject,comment) VALUES ('$email','$subject','$comment')";

                        $res = mysqli_query($conn,$query);

                        if($res){
                            $subject ="Leave Comment";
                            $body ="Dear, $email Your Form Successfully Submitted. Thank You for your comment";
                            $headers = "From: Joydip Manna";
                            if(mail($email,$subject,$body,$headers)){
                              echo "Successfully Mail Sent";
                            }
                            else{
                                echo "UnSuccessfully Mail Sent";
                            }
                            ?>
                            <script>
                                alert("Your Comment Successfully Sumitted");
                                location.replace('index.php');
                            </script>
                        <?php
                        }
                        else{
                            ?>
                            <script>
                                alert("Your Comment Not Submitted");
                            </script>
                        <?php
                        }
                    }

                }
              mysqli_close($conn);
            ?>


            <div id="hline"></div>
            <form action="" method="post">
                <span id="e">Email</span>
                <p><input type="text" name="email" id="email" placeholder="Enter Your Email" required></p>
                <span>Subject</span>
                <p><input type="text" name="subject" id="" placeholder="Enter Your Subject" required></p>
                <span>Leave Comment</span>
                <p><textarea rows="5" cols="20" name="comment" required></textarea></p>
                <p id="subtn"><input type="submit" name="submit" id="submit"></p>
            </form>

        </div>
    </div>

    <script>
        const email = document.getElementById('email');

        const funcName = () => {
            document.getElementById('e').style.textTransform = "translateY(5rem)";
        }

        email.addEventListener(click, funcName);
    </script>
</body>

</html>