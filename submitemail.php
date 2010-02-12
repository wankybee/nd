<?

/************************
* Variables you can change
*************************/

$mailto = "badri.dilbert@gmail.com";
$cc = "";
$bcc = "";
$subject = "Email subject";
$vname = "Autotech CNC enquiry";


/************************
* do not modify anything below unless you know PHP/HTML/XHTML
*************************/


$mobile = $_POST['mobile'];

function validateMobile($mobile)
{
   if(eregi('^[0-9]{10}$', $mobile))
	  return true;
   else
	  return false;
}


if((strlen($_POST['name']) < 1 ) || (strlen($mobile) < 1 ) || validateMobile($mobile) == FALSE){	
	if(strlen($_POST['name']) < 1 ){
		$emailerror .= '<li>Enter name</li>';
	}

	if(strlen($mobile) < 1 ){
		$emailerror .= '<li>Enter a 10 digit mobile no.</li>';
	}
        // validate mobile number only after it is entered
        else {
	       if(validateMobile($mobile) == FALSE) {
		   $emailerror .= '<li>Enter a valid mobile no.</li>';
	     }
	}
} else {

	$emailerror .= "<span>Your email has been sent successfully!</span>";



	// NOW SEND THE ENQUIRY

	$timestamp = date("F j, Y, g:ia");

	$messageproper ="\n\n" .
		"Name: " .
		ucwords($_POST['name']) .
		"\n" .
		"Phone: " .
		ucwords($mobile) .
		"\n" .
		"\n" .
		"\n\n" ;

		$messageproper = trim(stripslashes($messageproper));
		mail($mailto, $subject, $messageproper, "From: \"$vname\" <".$_POST['e_mail'].">\nReply-To: \"".ucwords($_POST['first_name'])."\" <".$_POST['e_mail'].">\nX-Mailer: PHP/" . phpversion() );

}
?>

<div id='emailerror'>
	<ul>
		<? echo $emailerror; ?>
	</ul>
</div>

