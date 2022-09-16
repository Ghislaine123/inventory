<html>
<?php
    $conn=mysqli_connect("localhost","root","","inventory");
    if(!$conn)
    {
        die(mysqli_error($conn));
    }
    ?>
     <head>
          <title>Adding new categories</title>
     <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>

        <?php include '../include/nav.php'; ?>
        <main>
        <div class="content-container">
    <div class="add-container">

    <a href="index.php">Categories</a>


</div>
<div class="login-form">
<h1>ADD NEW CATEGORIES</h1>
<form method="POST">
     <div>
     <label for="category_name">category_name:</label>
     <input type="text" name="category_name" id="category_name" required="required">
</div>
     <button type="submit" name="send">send</button>
</form>
</div>
<?php
if(isset($_POST["send"]))
{
     $a=$_POST['category_name'];
     $sql="insert into category(category_name)values('$a')";
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