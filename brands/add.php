<html>
<?php
    $conn=mysqli_connect("localhost","root","","inventory");
    if(!$conn)
    {
        die(mysqli_error($conn));
    }
    ?>
     <head>
          <title>Adding new brands</title>
     <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>

        <?php include '../include/nav.php'; ?>
        <main>
        <div class="content-container">
    <div class="add-container">

    <a href="index.php">Brands</a>


</div>
<div class="login-form">
<h1>ADD NEW BRANDS</h1>
<form method="POST">
     <div>
     <label for="brand_name">brand_name:</label>
     <input type="text" name="brand_name" id="brand_name" required="required">
</div>
     <button type="submit" name="send"> send</button>
</form>
</div>
<?php
if(isset($_POST["send"]))
{
     $a=$_POST['brand_name'];
     $sql="insert into brand(brand_name)values('$a')";
     $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));

if($result)
{
     echo "inserted";
}
else
{
     echo "not inserted";
}
}
?>
</main>
</body>
</html>