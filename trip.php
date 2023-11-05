<?php

$errors = '';
$myemail = 'info@voyagees.com';//<-----Put Your email address here.
if(empty($_POST['firstname'])  || 
   empty($_POST['lastname']) || 
   empty($_POST['email']))
{
    $errors .= "\n Error: all fields are required";
}

$firstname = $_POST['firstname']; 
$lastname = $_POST['lastname']; 
$phone = $_POST['phone'];
$email = $_POST['email']; 
$arrive = $_POST['arrive'];
$depart = $_POST['depart'];
$adults = $_POST['adults'];
$children = $_POST['children'];
$message = $_POST['message'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))

{

$to = $myemail;

$email_subject = "Tour form submission: $name";

$email_body = "You have received a new message. ".

" Here are the details:\n First name: $firstname \n Last name : $lastname \n Phone : $phone \n E-mail : $email \n Arrive : $arrive \n Depart : $depart \n Adults: $adults\n Children : $children\n Message :\n $message";

$headers = "From: $myemail\n";

$headers .= "Reply-To: $email";

mail($to,$email_subject,$email_body,$headers);

//redirect to the 'thank you' page

echo "Thank you, you message has been sent!";;

}
?>