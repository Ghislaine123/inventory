
<?php
session_start();

// display error if any

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 

$conn=mysqli_connect("localhost","root","","inventory");
if(!$conn)
{
    die(mysqli_error($conn));
}


//  insert into DB

if(isset($_POST['register']))
{
    $names=$_POST['names'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $repeat=$_POST['repeat_password'];


    // form validation 

    // 1 check for emptyness
    // 2 password matches
    $_SESSION["error"] = [];

    if($names == ""){
        array_push($_SESSION["error"], "Error Names cant be empty") ;

    }

    if($email == ""){
        // echo "Error email cant be empty";

       array_push($_SESSION["error"], "Error email cant be empty") ;

    }


     if($password != $repeat)
    {
        // echo "Error email cant be empty";
        array_push($_SESSION["error"], "Password mismatch") ;

    }
    else{
        $sql="insert into register(names,email,phone,password)values('$names','$email','$phone','$password')";
        $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
        if($result)
        {
            echo "register successfully";
            $_SESSION["success"] = "";
        }
        else
        {
            echo "not successfully";
        }
    }

    // print_r($_SESSION["error"]);


}
?>



<html>
    <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
        <title>REGISTER</title>
</head>
<body>

<?php // include 'include/nav.php'; ?>


    <div class="login-form">
    <h1><u><b>REGISTER</h1></u></b>
    <form method="POST">

    <div class="error-container">
            
        <?php 
        if(isset($_SESSION["error"])){
            for($i=0; $i< Count($_SESSION["error"]); $i++){
                echo '<p class="error">' . $_SESSION["error"][$i]. '</p>';

            }

            unset($_SESSION["error"]);


        }
        ?>
            
    </div>
<div>
        <label for="names">Names:</label>
        <input type="text" name="names" >
</div>

<div>
    <label for="email">E-mail:</label>
    <input type="email" name="email" >
</div>


<div>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" >
</div>

<div>
        <label for="password">Password:</label>
        <input type="password" name="password" >
</div>

<div>
        <label for="repeat_password">Repeat-password:</label>
        <input type="password" name="repeat_password" >
</div>

<div>
    <button name="register" type="submit">register</button>
</div>

<div>
    <p> Have an account ? <span> <a href="login.php">Login</a> </span></p>
</div>
</div>
</body>
</html>
