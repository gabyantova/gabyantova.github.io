<?php


/*ERRORS AND FIELDS*/
$firstnameErr = $lastnameErr = $emailErr = $messageErr = "";
$firstname = $lastname = $email = $message = "";

$firstnameValid = $lastnameValid = $emailValid = $messageValid = False;

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$message = $_POST['message'];

$recipient = "gaby.antova@gmail.com";
$subject = "Web Contact Form";
$mailheader = "From: $email \r\n";
$name = $firstname." ".$lastname;
$success = "Thank you. Your email has been sent successfully! Expect a response in 1-3 business days.";

$formcontent="This message was sent though Gaby Antova's web contact form.\nFrom: $name \nMessage:\n$message";



  /* VALIDATE FIRST NAME */
  if (empty($firstname)) {
    $firstnameErr = "First name is required";
  }
  elseif (preg_match("/^[^<,\"@/{}()*$%?=>:|;#]*$/i", $firstname)) {
    $firstnameErr = "Please enter a valid first name.";
  }
  else{
    $firstnameValid = True;
  }

  /* VALIDATE LAST NAME */
  if (empty($lastname)) {
    $lastnameErr = "Last name is required";
  }
  elseif (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
    $lastnameErr = "Please enter a valid last name.";

  }
  else{
    $lastnameValid = True;
  }


  // VALIDATE EMAIL
  if (empty($email)) {
    $emailErr = "Email field cannot be empty";
  }
  elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
    $emailErr = "Not a valid email address.";
  }
  else{
    $emailValid = True;
  }


  // VALIDATE MESSAGE
  if (empty($message)) {
    $messageErr = "Please fill in a message";
  }
  else{
    $messageValid = True;
  }


if ($firstnameValid && $lastnameValid && $emailValid && $messageValid){
  mail($recipient, $subject, $formcontent, $mailheader); //or die("Error!");
  echo '{ "success": true, "response": "' . $success .  '" }';
}
else {
  echo '{ "success": false, "errorArray":[';

    $array = '';
    if (!$firstnameValid){
      $array .= ('"' . $firstnameErr . '",');
    }

    if (!$lastnameValid){
      $array .= ('"' . $lastnameErr . '",');
    }
    if (!$emailValid){
      $array .= ('"' . $emailErr . '",');
    }
    if (!$messageValid){
      $array .= ('"' . $messageErr . '",');
    }

  echo rtrim($array, ",");
  echo '] }';
}

?>
