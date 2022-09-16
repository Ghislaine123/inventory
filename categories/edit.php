<?php
 $conn=mysqli_connect("localhost","root","","inventory");
 if(!$conn)
 {
     die(mysqli_error($conn));
 }
 $sql="select * from category where category_id=".$_GET['id'];
 $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
 while($row=mysqli_fetch_array($result))
 {
    $a=$row['category_id'];
    $b=$row['category_name'];
 }
 $id=$_GET['id'];
?>
<html>
    <head>
    
     <head>
     <title>UPDATE CATEGORIES</title>
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
        <label for="category_name">category_name:</label>
        <input type="text" name="category_name" id="category_name"value="<?php echo $b; ?>">
</div>
        <input type="submit" name="update" value="update">
</form>
<?php 
if(isset($_POST['update']))
{
    $a=$_POST['id'];
    $b=$_POST['category_name'];
    $sql="update category set category_name='$b' where category_id='$a'";
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