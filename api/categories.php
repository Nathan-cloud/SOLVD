<?php
header('Content-Type: application/json');
$categories =  array();
require"connection.php";

$query = mysqli_query($connection,"SELECT * FROM categories");
while($data = mysqli_fetch_assoc($query))
{

$categories[] = $data;
}

$response = json_encode($categories,TRUE);
print $response;
