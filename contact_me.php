<?php
// Check for empty fields
if(empty($_POST['client_name'])      ||
   empty($_POST['client_email'])     ||
   empty($_POST['client_mobile'])     ||
   empty($_POST['event_type'])   ||
   empty($_POST['event_location'])   ||
   empty($_POST['event_date'])   ||
   empty($_POST['event_description'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$client_name = strip_tags(htmlspecialchars($_POST['client_name']));
$client_email = strip_tags(htmlspecialchars($_POST['client_email']));
$client_mobile = strip_tags(htmlspecialchars($_POST['client_mobile']));
$event_type = strip_tags(htmlspecialchars($_POST['event_type']));
$event_location = strip_tags(htmlspecialchars($_POST['event_location']));
$event_date = strip_tags(htmlspecialchars($_POST['event_date']));
$event_description = strip_tags(htmlspecialchars($_POST['event_description']));

// Create the email and send the message
$to = 'powerquoteseries@designturfng.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Booking from $client_name";
$email_body = "Someone just booked a session with you.
\n\n"."Here are the details:
\n\nClient's Name: $client_name
\n\nClient Email Address: $client_email
\n\nClient Mobile Number: $client_mobile
\n\nType of Event: $event_type
\n\nLocation of Event: $event_location
\n\nDate of Event: $event_date
\n\nBrief Description of Event: $event_description
$headers = "From: BOOKING@POWER_QUOTE_SERIES.com\n"; // This is the email address the generated message will be from.
$headers .= "Reply-To: $client_email";   
mail($to,$email_subject,$email_body,$headers);
echo 'Thanks! <a href="index.html">Return to homepage.</a>';

return true;         
?>