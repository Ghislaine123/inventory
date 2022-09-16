<?php
 $conn=mysqli_connect("localhost","root","","inventory");
 if(!$conn)
 {
     die(mysqli_error($conn));
 }
 $sql="select * from products where product_id=".$_GET['id'];
 $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
 while($row=mysqli_fetch_array($result))
 {
    $a=$row['product_id'];
    $b=$row['product_name'];
    $c=$row['unit_price'];
    $d=$row['category_id'];
    $e=$row['brand_id'];
 }
 $id=$_GET['id'];
?>
<html>
    <head>
    
     <head>
     <title>UPDATE PRODUCTS</title>
     <link rel="stylesheet" type="text/css" href="../assets/style.css">

        <?php include '../include/nav.php'; ?>
        <main>
        <div class="content-container">
    <div class="add-container">

    <a href="add.php">ADD</a>


</div>
        
</head>
<body>
    <h1>update</h1>
    <form method="POST">
        <div>
        <input type="hidden" name="id" value="<?php echo $a;?>">
</div>
<div>
        <label for="product_name"> Product_name:</label>
       <input type="text" name="product_name" id="product_name"value="<?php echo $b; ?>">
</div>
<div>
       <label for="unit_price">Unit_price:</label>
        <input type="text" name="unit_price" id="unit_price"value="<?php echo $c; ?>">
</div>
<div>
        <label for="category_id">Category_id:</label>
        <input type="text" name="category_id" id="category_id"value="<?php echo $d; ?>">
</div>
<div>
        <label for="brand_id">Brand_id:</label>
        <input type="text" name="brand_id" id="brand_id"value="<?php echo $e; ?>">
</div>
        <input type="submit" name="update" value="update">
</form>
<?php 
if(isset($_POST['update']))
{
    $a=$_POST['id'];
    $b=$_POST['product_name'];
    $c=$_POST['unit_price'];
    $d=$_POST['category_id'];
    $e=$_POST['brand_id'];
    $sql="update products set product_name='$b',unit_price='$c',category_id='$d',brand_id='$e' where product_id='$a'";
    $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
    if($result)
    {
        echo "updated";
    }
    else
    {
        echo "not updated";
    }
}
?>
</main>
</body>
</html>