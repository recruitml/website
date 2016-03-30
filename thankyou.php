<?php
date_default_timezone_set('Canada/Mountain');

require_once('defines.php');
require_once('PHPMailer/class.phpmailer.php');

$type = isset($_GET['type']) ? $_GET['type'] : '';
$type = in_array($type, array('signup','contact')) ? $type : false;

if (!$type)
{
	$result['type'] = 'error';		
	$result['category'] = 'type';
	$result['message'] = 'Invalid Type';
}
else
{
	$subject = 'RecruitML - Form Submission ['.$type.']';
	
	$message = '
	<html>
	<head>
	<style>
		body { font: 16px Arial, Helvetica, sans-serif; color: #666; }
	</style>
	</head>
	<body>
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td style="padding-bottom:16px">
				<img src="'.MDP_SITE_PATH.'/images/logo-main.png" width="100" alt="RecruitML Logo" />
			</td>
		</tr>
	';
	$message .= '<tr><td>You have a new <b>'.ucfirst($type).'</b> form submission with the following details:</td></tr>';
	$message .= '<tr><td>&nbsp;</td></tr>';
	$message .= '<tr><td><table border="0" cellpadding="0" cellspacing="0">';
	$message .= '<tr><td width="80px"><b>Name</b>: </td><td>'.$_POST['name'].'</td></tr>';
	$message .= '<tr><td><b>Company</b>: </td><td>'.$_POST['company-name'].'</td></tr>';
	$message .= '<tr><td><b>Phone</b>: </td><td>'.$_POST['phone'].'</td></tr>';
	$message .= '<tr><td><b>Email</b>: </td><td>'.$_POST['email'].'</td></tr>';
	$message .= '<tr><td><b>Describe</b>: </td><td>'.$_POST['describes'].'</td></tr>';
	$message .= '<tr><td valign="top"><b>Comments</b>: </td><td>'.str_replace("\r\n","",$_POST['message']).'</td></tr>';	
	$message .= '</table></td></tr>';
	
	$message .= '</table></body></html>';
	
	$mail = sendMail(MDP_EMAIL_TO, $subject, $message);
	
	if ($mail->ErrorInfo)
	{
		$result['type'] = 'error';		
		$result['category'] = 'mail';
		$result['message'] = 'Mail server unable to send mail to Admin.';
		$result['message'] .= '<br>Reason: ' . $mail->ErrorInfo;
	}
	else
	{			
		$result['type'] = 'success';
	}
}

function sendMail($to, $subject, $message)
{
	$mail = new PHPMailer();
	
	/* DEBUG */
	/*
	$mail->SMTPDebug  = 2;
	*/	
	//$to = "greg@stevens.pro";
	
	$mail->CharSet = 'UTF-8';	
	$mail->IsSMTP();
	//$mail->Host = MDP_MAIL_SMTP;
	
	
	
	$mail->IsHTML(true);
	
	
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "patrick.t.reilly@gmail.com";  // GMAIL username
$mail->Password   = "gloqgbvgkwjkcgyn";            // GMAIL password	
	
	
	
	
	$mail->SetFrom("noreply@recruitml.com", 'RecruitML');
	$mail->AddAddress($to);
	$mail->Subject = $subject;
	$mail->Body = $message;
	//$mail->MsgHTML($message);
	
	$mail->Send();

	return $mail;	
}


?>

<html>
	<head>
		<?php include("includes/01-htmlhead.php"); ?>
		<title>Thank You | RecruitML</title>
	</head>

<body class="<?php echo $type ?>">
	<header>
		<?php include("includes/02-header.php"); ?>
		<blockquote>
			<?php if ($result['type'] == 'success') : ?>
				<h1>Thank You</h1>
			<?php else : ?>
				<h1>Error</h1>
			<?php endif ?>
		</blockquote>
	</header>
	<main>
		<div class="content-block">
			<?php if ($result['type'] == 'success') : ?>
				<p>Your message has been received. We will be in touch with you shortly.</p>
			<?php else : ?>
				<?php echo $result['message'] ?>
			<?php endif ?>
		</div>	
		<div class="cta">
			<h4>Return to</h4>
			<a href="/" class="button">Home Page</a>
		</div>
	</main>


<?php include("includes/03-footer.php"); ?>