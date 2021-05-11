<?php

include('config.php');

if (isset($_POST['submit']))
{
$id=$_POST['id'];
$serial=mysqli_real_escape_string($db, $_POST['serial_num']);
$name=mysqli_real_escape_string($db, $_POST['product_name']);
$price=mysqli_real_escape_string($db, $_POST['price']);
$emp_id=mysqli_real_escape_string($db, $_POST['username']);

mysqli_query($db,"UPDATE product SET product_name='$name',serial_num='$serial', price='$price', username='$emp_id' WHERE product_id='$id'");

header("Location:table.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($db,"SELECT * FROM product WHERE product_id=".$_GET['id']);

$row = mysqli_fetch_array($result);

if($row)
{

$id = $row['product_id'];
$serial = $row['serial_num'];
$name = $row['product_name'];
$price = $row['price'];
$emp_id = $row['username'];

}
else
{
echo "No results!";
}
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Edit Item</title>
  <link rel="shortcut icon" type="image/jpg" href="logo.png"/>
  <style>
        .content {
            max-width: 500px;
            margin: auto;
        }

        table {
            width: 500px;
        }

        tr {
            height: 70px;
        }
    </style>
</head>
<body>



<form action="" method="post" action="edit.php">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<table border="1">
<tr>
<td colspan="2"><b><font color='Red'>Edit Records </font></b></td>
</tr>

<tr>
<td width="179"><b><font >Serial Number<em>*</em></font></b></td>
<td><label>
<input type="text" name="serial_num" value="<?php echo $serial; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font >Item Name<em>*</em></font></b></td>
<td><label>
<input type="text" name="product_name" value="<?php echo $name; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Price<em>*</em></font></b></td>
<td><label>
<input type="text" name="price" value="<?php echo $price ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font >Assigned to<em>*</em></font></b></td>
<td><label>
<input type="text" name="username" value="<?php echo $emp_id; ?>" />
</label></td>
</tr>


<tr align="Center">
<td colspan="2"><label>
<input type="submit" name="submit" value="Edit Records">
</label></td>
</tr>
</table>
</form>
</body>
</html>
