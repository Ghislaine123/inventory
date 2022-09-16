<html>
<?php
    $conn=mysqli_connect("localhost","root","","inventory");
    if(!$conn)
    {
        die(mysqli_error($conn));
    }
    ?>
     <head>
          <title>Adding new Sales</title>
     <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>

        <?php include '../include/nav.php'; ?>
        <main>


        <div class="content-container">
    <div class="add-container">

    <a href="index.php">Sales</a>


</div>
<div class="login-form">
<h1>ADD SALES</h1>
<form method="POST">



     <div>
        <label for="product_id"> Products </label>

        <select name="product_id" id="product_id">
            <option value=""> -- select --</option>

            <?php
            $sql="select *  from products";
            $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
            while($row=mysqli_fetch_assoc($result))
            {
               echo '<option value="'. $row['product_id']  .'"  > '.  $row['product_name']  .'  </option> ';
            }
            ?>
        </select>
     </div>
     <div>
    <!-- <label for="due_date">Due date</label>
    <input type="date" name="due_date" id="due_date" required="required"> -->

</div>

<div>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" required="required">

</div>

     
     <br><br>
     <button type="submit" name="send" >send</button>
</form>
          </div>
<?php
if(isset($_POST["send"]))
{
     $a=$_POST['product_id'];
    //  $b=$_POST['due_date'];

     $qty=$_POST['quantity'];
     $total=0;
     $unit_price = 0;

     $sql="select * from products WHERE product_id=$a LIMIT 1";
     $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));

     while($row=mysqli_fetch_assoc($result))
     {
        $unit_price=$row['unit_price'];
     }

    //  echo $unit_price." ". $qty;

     $total=$unit_price*$qty;
     $sql="insert into sales(product_id,due_date,quantity,total_amount)values('$a', now() ,'$qty','$total')";
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