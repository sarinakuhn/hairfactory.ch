<?php
if(!isset($_POST['name']) || !isset($_POST['vorname']) || !isset($_POST['telefon']) || !isset($_POST['email']) || !isset($_POST['datum']) || !isset($_POST['uhrzeit'])) {
	header("Location: zuerich_reservation.html");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
	<title>Hairfactory</title>
</head>
<body>
	<?php
	$name = $_POST['name'];
	$vorname = $_POST['vorname'];
	$telefon = $_POST['telefon'];
	$email = $_POST['email'];
	$datum = $_POST['datum']; 
	$uhrzeit = $_POST['uhrzeit']; 
	$myemail = "kuhn@alnovo.ch"; // E-Mail-Adresse, an welche Mail gesendet wird.
	$ccx = ""; 
	$todayis = date("l, F j, Y, g:i a") ;
	$subject = "Reservation von der Internetseite www.hairfactory.ch - Zürich"; 
	$text = stripcslashes($mitteilung); 
	$text = "
Name:			$name
Vorname:		$vorname
Telefon:		$telefon
E-Mail:		$email \n
Datum:		$datum
Uhrzeit:		$uhrzeit";
	$message = "$todayis [EST] \n
Reservation:\n$text";
	$from = "From: $email\r\n";
	if (strstr($message,"Content-Type")) {
		die();
	} else {
		if ($myemail != "")
			mail($myemail, $subject, $message, $from);
		if ($ccx != "")
			mail($ccx, $subject, $message, $from);
	}
	header("Location: zuerich_reservation_thanks.html");
	?>
</body>
</html>