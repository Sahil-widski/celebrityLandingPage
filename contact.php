<?php
include('smtp/PHPMailerAutoload.php');

$field_Name = $_POST['CompleteName'];

$field_Email = $_POST['EmailAddress'];

$field_Number = $_POST['PhoneNo']; 

$field_Messager = $_POST['Message']; 

$html="Name: $field_Name <br> 
               Email: $field_Email <br>
               Mobile Number: $field_Number<br>
               Requirement: $field_Messager";

               
echo smtp_mailer('mandakini.digimarketerz@gmail.com','Lead From zoommantra celebrity landing page',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	//$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host = "smtpout.secureserver.net";
	$mail->Port = 465;  
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "info@zoommantra.com";
	$mail->Password = "Team@121";
	$mail->SetFrom("noreplay@zoommantra.ae","Zoommantra celebrity");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	//$mail->AddAddress('mandakini@digimarketerz.com');
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{ ?>
	
		<script language="javascript" type="text/javascript">

		alert('Thank you for the message. We will contact you shortly.');

		window.location = 'demos.html';

    	</script>

	<?php }
}
?>
