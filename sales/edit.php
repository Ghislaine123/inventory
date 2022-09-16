<?php
 $conn=mysqli_connect("localhost","root","","inventory");
 if(!$conn)
 {
     die(mysqli_error($conn));
 }
 $sql="select * from sales where sales_id=".$_GET['id'];
 $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
 while($row=mysqli_fetch_array($result))
 {
    $a=$row['sales_id'];
    $b=$row['product_id'];
    $c=$row['due_date'];
    $d=$row['quantity'];
    $e=$row['total_amount'];
 }
 $id=$_GET['id'];
?>
<html>
    <head>
    
     <head>
     <title>UPDATE SALES</title>
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
        <label for="product_id"> Products </label>

        <select name="product_id" id="product_id">
            <option value=""> -- select --</option>

            <?php
            $sql="select *  from products";
            $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
            while($row=mysqli_fetch_assoc($result))
            {

                if($row['product_id'] == $b){
                 echo '<option selected  value="'. $row['product_id']  .'"  > '.  $row['product_name']  .'  </option> ';

                }
                else
                {
                    echo '<option  value="'. $row['product_id']  .'"  > '.  $row['product_name']  .'  </option> ';

                }
            }
            ?>
        </select>
     </div>


<div>   
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity"value="<?php echo $d; ?>">
</div>

        <input type="submit" name="update" value="update">
</form>
<?php
if(isset($_POST['update']))
{




    $a=$_POST['id'];
    $b=$_POST['product_id'];
    // $c=$_POST['due_date'];/
    $d=$_POST['quantity'];


    $sql="select * from products WHERE product_id=$b LIMIT 1";
    $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));

    while($row=mysqli_fetch_assoc($result))
    {
       $unit_price=$row['unit_price'];
    }

    $total_amount = $unit_price * $d;

    $sql="update sales set product_id='$b',quantity='$d',total_amount='$total_amount' where sales_id='$a'";
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