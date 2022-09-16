
<!DOCTYPE html> 
<html lang="en">
    <?php
    $conn=mysqli_connect("localhost","root","","inventory");
    if(!$conn)
    {
        die(mysqli_error($conn));
    }


    if(isset($_GET['type'])  && $_GET['type'] == "delete" && isset($_GET['id'])){

        $id = $_GET['id'];

        // codes to delete
        $sql="delete from products where product_id=".$_GET['id'];
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

<table border="1" cellpadding="5" cellspacing="0" class="table1">
<thead>
<tr>
        <th>Product id</th>
        <th>Product name</th>
        <th>Unit price</th>
        <th>Category</th>
        <th>Brand</th>
        <th>option</th>
</tr>
</thead>
<tbody>
    
<?php
$sql="select * from products INNER JOIN category 
ON products.category_id=category.category_id 
INNER JOIN brand ON brand.brand_id=products.brand_id";
$result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($result))
{
    echo '<tr>';
    echo '<td>'.$row['product_id'].'</td>';
    echo '<td>'.$row['product_name'].'</td>';
    echo '<td>'.$row['unit_price'].'</td>';
    echo '<td>'.$row['category_name'].'</td>';
    echo '<td>'.$row['brand_name'].'</td>';
    echo '<td>
    
    <a class="action-btn" href="edit.php?type=update&id='.$row['product_id'].'"> update </a>';
    echo '<a class="action-btn" href="?type=delete&id='.$row['product_id'].'">delete</a></td>';
    echo '</tr>';
}
?>
</tbody>
</table>

</div>
</main>
</body>
</html>