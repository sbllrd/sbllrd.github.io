<?php

if(isset($_POST['first_name'])){
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
    // validation expected data exists
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['telephone'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       

    }
 
    $message_request = $_POST['message_request'];

    $first_name = $_POST['first_name']; // required
 
    $last_name = $_POST['last_name']; // required
 
    $email_reply = $_POST['email']; // required
 
    $telephone = $_POST['telephone']; // not required

    $make = $_POST['make']; // not required

    $model = $_POST['model']; // not required

    $year = $_POST['year']; // not required
 
    $comments = $_POST['comments']; // required

    $email_to = "chadronmotorcompany@gmail.com";

    $email_from = "admin@chadronmotors.com";
 
    $email_subject = "New message from ".$first_name." ".$last_name." [".$message_request." Request] - Delivered by chadronmotors.com";
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
    $email_message .= "Type of request: ".clean_string($message_request)."\n\n";
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_reply)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n\n";

    $email_message .= "Make: ".clean_string($make)."\n";

    $email_message .= "Model: ".clean_string($model)."\n";

    $email_message .= "Year: ".clean_string($year)."\n\n";

    $email_message .= "Message: ".clean_string($comments)."\n";
 
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_reply."\r\n" .
 
'X-Mailer: PHP/' . phpversion();

  
  mail($email_to, $email_subject, $email_message, $headers);
 
  echo 'Message sent! Thank you for contacting us. We will be in touch with you soon.';
}
 
?>