<?php

include('config.php');

if (isset($_POST['submit']))
{
$id=$_POST['id'];
$status=mysqli_real_escape_string($db, $_POST['c_status']);
$remarks=mysqli_real_escape_string($db, $_POST['remarks']);

mysqli_query($db,"UPDATE product SET remarks='$remarks',c_status='$status' WHERE product_id='$id'");

header("Location:dashboard.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($db,"SELECT * FROM product WHERE product_id=".$_GET['id']);

$row = mysqli_fetch_array($result);

if($row)
{

$id = $row['product_id'];
$status = $row['c_status'];
$remarks = $row['remarks'];

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
<title>Update</title>
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



<form action="" method="post" action="update.php">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<table border="1">
<tr>
<td colspan="2"><b><font color='Red'>Update</font></b></td>
</tr>

<tr>
<td width="179"><b><font >Status<em>*</em></font></b></td>
<td><label>
<input type="text" name="c_status" placeholder = "available,worn out,lost"value="<?php echo $status; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font >Remarks<em>*</em></font></b></td>
<td><label>
<input type="text" name="remarks" value="<?php echo $remarks; ?>" />
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

