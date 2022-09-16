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
        $sql="delete from category where category_id=".$_GET['id'];
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
    <tr>
        <th>category_id</th>
        <th>category_name</th>
        <th>option</th>
</tr>

<?php
$sql="select * from category";
$result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
while($row=mysqli_fetch_assoc($result))
{
    echo '<tr>';
    echo '<td>'.$row['category_id'].'</td>';
    echo '<td>'.$row['category_name'].'</td>';
    echo '<td>
    <a href="edit.php?type=update&id='.$row['category_id'].'">update</a>';
    echo '<a href="?type=delete&id='.$row['category_id'].'">delete</a></td>';
    echo '</tr>';
}
?>
</table>
</main>
</body>
</html>