<html>
<?php

// if session is not set (of successefully logged in ) of user
// go to login page

session_start();



    $conn=mysqli_connect("localhost","root","","inventory");
    if(!$conn)
    {
        die(mysqli_error($conn));
    }
    ?>
     <head>
          <title>Adding new products</title>
     <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>

        <?php include '../include/nav.php'; ?>
        <main>


        <div class="content-container">
    <div class="add-container">

    <a href="index.php">Products</a>


</div>
<div class="login-form">
<h1>ADD NEW PRODUCTS</h1>
<form method="POST">

<div>
    <label for="product_name">product_name:</label>
    <input type="text" name="product_name" id="product_name" required="required">

</div>

<div>
    <label for="unit_price">unit price:</label>
    <input type="number" name="unit_price" id="unit_price" required="required">

</div>

     <div>
        <label for="category_id"> Category </label>

        <select name="category_id" id="category_id">
            <option value=""> -- select --</option>

            <?php
            $sql="select *  from category";
            $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
            while($row=mysqli_fetch_assoc($result))
            {
               echo '<option value="'. $row['category_id']  .'"  > '.  $row['category_name']  .'  </option> ';
            }
            ?>
        </select>
     </div>


     <div>
        <label for="brand_id"> Brand </label>

        <select name="brand_id" id="brand_id">
            <option value=""> -- select --</option>

            <?php
            $sql="select *  from brand";
            $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
            while($row=mysqli_fetch_assoc($result))
              {
                echo '<option value="'. $row['brand_id']  .'"  > '.  $row['brand_name']  .'  </option> ';
               }
            
            
            ?>
        </select>
     </div>
     
     <br><br>
     <button type="submit" name="send">send</button>
</form>
            </div>
<?php
if(isset($_POST["send"]))
{
     $a=$_POST['product_name'];
     $b=$_POST['unit_price'];
     $c=$_POST['category_id'];
     $d=$_POST['brand_id'];
     $sql="insert into products(product_name,category_id,brand_id)values('$a','$b','$c','$d')";
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

</div>

</main>


</html>