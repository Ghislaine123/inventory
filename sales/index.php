
<!DOCTYPE html> 
<html lang="en">
    <?php
    session_start();

    if(!isset($_SESSION["logged"])){

        header('location: ../login.php');

    }

    $conn=mysqli_connect("localhost","root","","inventory");
    if(!$conn)
    {
        die(mysqli_error($conn));
    }


    if(isset($_GET['type'])  && $_GET['type'] == "delete" && isset($_GET['id'])){

        $id = $_GET['id'];

        // codes to delete
        $sql="delete from sales where sales_id=".$_GET['id'];
        $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
        
    }


    ?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category </title>
    <link rel="stylesheet" type="text/css" href="../assets/style.css">

</head>
<body>
<?php include '../include/nav.php'; ?>
<main>
<div class="content-container">
    <div class="add-container">

    <a href="add.php">ADD</a>


</div>
<marquee><b>WELCOME TO OUR INVENTORY SALES</b></marquee>
<table border="1" cellpadding="5" cellspacing="0" class="table1">
<thead>
<tr>
        <th>Sales Id</th>
        <th>Product name</th>
        <th>Due Date</th>
        <th>Quantity</th>
        <th>Total Amount</th>
        <th>option</th>
</tr>
</thead>
<tbody>
    
<?php
$sql="select * from products INNER JOIN sales 
ON products.product_id=sales.product_id";

$result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($result))
{
    echo '<tr>';
    echo '<td>'.$row['sales_id'].'</td>';
    echo '<td>'.$row['product_name'].'</td>';
    echo '<td>'.$row['due_date'].'</td>';
    echo '<td>'.$row['quantity'].'</td>';
    echo '<td>'.$row['total_amount'].'</td>';
    
    echo '<td>
    
    <a class="action-btn" href="edit.php?type=update&id='.$row['sales_id'].'"> update </a>';
    echo '<a class="action-btn" href="?type=delete&id='.$row['sales_id'].'">delete</a></td>';
    echo '</tr>';
}
?>
</tbody>
</table>

</div>
</main>
</body>
</html>