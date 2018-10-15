
<?php     
$to_email = 'deddikation@gmail.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: no-reply@scholartransport.mkteck.co.za';
mail($to_email,$subject,$message,$headers);
?>