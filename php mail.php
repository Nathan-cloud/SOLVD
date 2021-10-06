<?php
///variable setting

$name = $_REQUEST['name'];

$email = $_REQUEST['Email'];

$message= $_REQUEST['Message'];

//check input fields

if(empty($name) || empty($email) || empty($message))
{
echo "please fill all fields";
}

else{
mail("morgannathan168@gmail.com", "message", $message, "From: $name<$email>");
echo"<script type='text/javascript'> alert('Your message sent sucessfully');
window.history.log(-1);
</script>";

}   

?>

