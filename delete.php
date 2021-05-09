
<?php
$db = mysqli_connect('us-cdbr-east-03.cleardb.com', 'b8fde6f3e15a94', '9e0c4460', 'heroku_1fc3bbe61793651');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
<?php

if (isset($_GET['id']))
{

$result = mysqli_query($db,"DELETE FROM product WHERE product_id=".$_GET['id']);
if($result==true)
	echo "sucess";
header("Location:table.php");
}

?>
