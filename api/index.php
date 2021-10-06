<?php
header('Content-Type: application/json');
$array =  array();

if($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET" )
{

$categoryId = $_POST["category_id"];
require"connection.php";
require("validate.data.php");

$query = mysqli_query($connection,"SELECT * FROM categories WHERE category_id ='$categoryId'");
$categories = array();

while($data = mysqli_fetch_assoc($query))
{
$categoryId = $categories["category_id"] = $data["category_id"];
$categories["category_name"] = $data["category_name"];

$q = mysqli_query($connection,"SELECT * FROM courses WHERE category_id='$categoryId' ") or die(mysqli_error($connection));

    $rows = array();
    while($r = mysqli_fetch_assoc($q)) {
        $r["courseThumbNail"] = "https://fgcchubodessa.com/PROJECTS/somabox.org/courses/".$r["courseThumbNail"] ;
        $r["courseUrl"] ="https://fgcchubodessa.com/PROJECTS/somabox.org/courses/".$r["courseUrl"];
        $rows[] = $r;
        $categories["courses"]=$rows; 
    } 

    
$array[] = $categories;
}
$response = json_encode($array,TRUE);

print($response);

}else{
    echo "Unkown request";
}

?>
