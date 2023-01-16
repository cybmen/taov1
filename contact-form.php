<?php
$name= $_POST['name'];
$phone= $_POST['phone'];
$emailHelp= $_POST['email'];
$comments=$_POST['comments'];

if(isset($name) && isset($phone) && isset($emailHelp))
{
	global $to_email,$vpb_message_body,$headers;
	$to_email="taotechnologyllc@gmail.com";
	// $email_subject="Inquiry From Contact Page";
	$vpb_message_body = nl2br("...".$_SERVER['HTTP_HOST']." dated ".date('d-m-Y').".\n
	
	name: ".$name."\n
	Email Address: ".$emailHelp."\n
    Phone: ".$subject."\n

	Message: ".$comments."\n
	User Ip:".getHostByName(getHostName())."\n
	Thank You!\n\n");
	
	//Set up the email headers
    $headers    = "From: $name <$emailHelp>\r\n";
    $headers   .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers   .= "Message-ID: <".time().rand(1,1000)."@".$_SERVER['SERVER_NAME'].">". "\r\n"; 
   
	 if(@mail($to_email, $vpb_message_body, $headers))
		{
			  $status='Success';
			//Displays the success message when email message is sent
			  $output="Thanks ".$name.", your email message has been sent successfully! We will get back to you as soon as possible. TAO Technology Team.";
		} 
		else 
		{
			 $status='error';
			 //Displays an error message when email sending fails
			  $output="Sorry, there is a problem. Please try later. Thanks.";
		}
		
}
else{

	echo $name;
	$status='error';
	$output="please fill required fields";
	
	}
echo json_encode(array('status'=> $status, 'msg'=>$output));


?>