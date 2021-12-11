<?php
$insert = false;;
   if(isset($_POST['name'])){
   $server = 'localhost';
   $username = 'root';
   $password = "";

   $con = mysqli_connect($server, $username, $password);
   if(!$con){
       die("connection to database failed due to".
       mysqli_connect_error());
   }
    //echo "succes connecting to db";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`iit` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    //echo $sql;

    if($con->query($sql) == true){
        //echo "successfuly inserted";
        $insert = true;
    }
    else{
        echo mysqli_error($con);
    }

    $con->close();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website Project</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="#">
    <div class="container">
        <h1>Welcome to VIT Bhopal US Trip form</h1>
        <p>Enter your details to confirm your participation in the trip</p>
        <?php
        if($insert == true){
         echo "<p class='submitmsg'>Thank you for submitting the form. We are happy to see you.</p>";
        }
        ?>
        
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone no.">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter description"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
   
</body>
</html>
