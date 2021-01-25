<?php
/*-----------------------------------------------
	# Variables
	---------------------------------------------*/

$namec      = $_POST['namec'];
$linkc      = $_POST['linkc'];
$linkrs     = $_POST['linkrs'];
$tag        = $_POST['tag'];
$price      = $_POST['price'];
$amount     = $_POST['amount'];
$namer      = $_POST['namer'];
$surnamer   = $_POST['surnamer'];
$email      = $_POST['email'];
$phone      = $_POST['fphone'];
$terminos     = $_POST['terminos'];
$publicidad      = $_POST['publicidad'];
$subject    = isset($_POST['subject']) && !empty($_POST['subject']) ? $_POST['subject'] : 'New message from your site contact form';
$content    = $_POST['content'];
$toMail     = 'Ucreators <formulario@ucreators.es>'; // Your name & mail address here example 'Your Name <contact@domain.com>'.

/*-----------------------------------------------
	# Error Reporting need first
	---------------------------------------------*/
$error      = false;
$msg        = '';
$body       = '';

// Check NameC
if (empty($namec)) {
	$error = true;
	$msg   .= '<strong>Required:</strong> Por favor introduce el nombre de tu canal.';
	$msg   .= '<br>';
} else {
	$body  .= '<strong>Nombre del canal (Twitch):</strong> ' . $namec;
	$body  .= '<br>';
}
// Check NameC
if (empty($linkc)) {
	$error = true;
	$msg   .= '<strong>Required:</strong> Por favor introduce el enlace de tu canal.';
	$msg   .= '<br>';
} else {
	$body  .= '<strong>Enlace del canal (Twitch):</strong> ' . $linkc;
	$body  .= '<br>';
}
// Check NameC
if (empty($linkrs)) {
	$error = true;
	$msg   .= '<strong>Required:</strong> Por favor introduce el nombre de tu otra red social';
	$msg   .= '<br>';
} else {
	$body  .= '<strong>Enlace de otra red social</strong> ' . $linkrs;
	$body  .= '<br>';
}
// Check NameC
if (empty($tag)) {
	$error = false;
	$body  .= '<strong>Categoria del canal (Twitch): No selecionada</strong> ';
	$body  .= '<br>';
} else {
	$body  .= '<strong>Categoria del canal (Twitch):</strong> ' . $tag;
	$body  .= '<br>';
}
// Check NameC
if (empty($price) || !is_numeric($price)) {
	$error = true;
	$msg   .= '<strong>Required:</strong> Por favor introduce el precio en número';
	$msg   .= '<br>';
} else {
	$body  .= '<strong>Precio de venta:</strong> ' . $price;
	$body  .= '<br>';
}
// Cantidad
if (empty($amount) || !is_numeric($amount)) {
	$error = true;
	$msg   .= '<strong>Required:</strong> Por favor introduce la cantidad en número';
	$msg   .= '<br>';
} else {
	$body  .= '<strong>Cantidad que ofrece:</strong> ' . $amount;
	$body  .= '<br>';
}
// Check NameC
if (empty($namer)) {
	$error = true;
	$msg   .= '<strong>Required:</strong> Por favor introduce tu nombre real';
	$msg   .= '<br>';
} else {
	$body  .= '<strong>Nombre:</strong> ' . $namer;
	$body  .= '<br>';
}
// Check NameC
if (empty($surnamer)) {
	$error = true;
	$msg   .= '<strong>Required:</strong> Por favor introduce tu apellido real';
	$msg   .= '<br>';
} else {
	$body  .= '<strong>Apellido:</strong> ' . $surnamer;
	$body  .= '<br>';
}
// Check NameC
if (empty($phone)) {
	$error = false;
	$body  .= '<strong>Telefono: No proporcionado</strong>';
	$body  .= '<br>';
} else {
	$body  .= '<strong>Telefono:</strong> ' . $phone;
	$body  .= '<br>';
}
// Check Email
if (empty($email)) {
	$error = true;
	$msg   .= '<strong>Required:</strong> Please enter your valid email address.';
	$msg   .= '<br>';
} else {
	$body  .= '<strong>Email:</strong> ' . $email;
	$body  .= '<br>';
}
// Check Content
if (empty($content)) {
	$error = true;
	$msg   .= '<strong>Required: </strong> Please write something. Can\'t here you from our home';
	$msg   .= '<br>';
} else {
	// Subject
	$body  .= '<strong>Subject:</strong> ' . $subject;
	$body  .= '<br>';

	// Body Content
	$body  .= '<strong>Message:</strong> ' . $content;
	$body  .= '<br>';
}
if (empty($terminos)) {
	$error = true;
	$msg   .= '<strong>Required:</strong> Please enter your valid switch address.';
	$msg   .= '<br>';
} else {
	$body  .= '<strong>Terminos y condiciones:</strong> ' . $terminos;
	$body  .= '<br>';
}

if (empty($publicidad)) {
	$error = true;
	$msg   .= '<strong>Required:</strong> Please enter your valid switch address.';
	$msg   .= '<br>';
} else {
	$body  .= '<strong>Desea recibir publicidad:</strong> ' . $publicidad;
	$body  .= '<br>';
}


/*-----------------------------------------------
	# Prepare send mail
	---------------------------------------------*/
if ($error == true) {
	$msg    .= '<strong>Error:</strong> Please fill form with above info requirement.';
} else {
	$body   .= $_SERVER['HTTP_REFERER'] ? '<br><br><br>This form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';
	$error   = false;
	$msg    .= '<strong>Success:</strong> Your message has been send.';

	// Mail Headers
	$headers   = array();
	$headers[] = "MIME-Version: 1.0";
	$headers[] = "Content-type: text/html; charset=iso-8859-1";
	$headers[] = "From: {$namer} <{$email}>";
	$headers[] = "Reply-To: {$namer} <{$email}>";
	$headers[] = "Subject: {$subject}";
	$headers[] = "X-Mailer: PHP/".phpversion();

	mail($toMail, $subject, $body, implode("\r\n", $headers));
}
// Make as json obj
$dataReturn = array(
	'error'   => $error,
	'message'   => $msg,
	'data'  => array(
		'name' => $name,
		'email' => $email,
		'subject' => $subject,
		'content' => $content
	)
);
header('Content-type: application/json');
echo json_encode($dataReturn);