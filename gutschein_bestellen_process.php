<?php
if(!isset($_POST['betrag']) || $_POST['betrag'] < 10 || $_POST['betrag'] > 500 || !is_numeric($_POST['betrag']) || !isset($_POST['name']) || !isset($_POST['vorname']) || !isset($_POST['strasse_nr']) || !isset($_POST['plz_ort']) || !isset($_POST['telefon']) || !isset($_POST['email'])) {
	header("Location: gutschein_bestellen.html");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
	<title>Hairfactory - Gutschein bestellen</title>
</head>
<body>
	<?php
	$betrag = $_POST['betrag'];
	$anrede = $_POST['anrede'];
	$name = $_POST['name']; 
	$vorname = $_POST['vorname']; 
	$strasse_nr = $_POST['strasse_nr'];
	$plz_ort = $_POST['plz_ort'];
	$telefon = $_POST['telefon'];
	$email = $_POST['email']; 
	if($email == "")
		$email = "kuhn@alnovo.ch";
	$bemerkung = $_POST['bemerkung'];
	$myemail = "kuhn@alnovo.ch"; // E-Mail-Adresse, an welche Mail gesendet wird.
	$ccx = ""; 
	$todayis = date("l, F j, Y, g:i a") ;
	$subject = "Gutscheinbestellung von der Internetseite www.hairfactory.ch"; 
	$text = stripcslashes($mitteilung); 
	$text = "
Anrede:		$anrede
Name:			$name
Vorname:		$vorname
Strasse / Nr.:	$strasse_nr
PLZ / Ort:		$plz_ort\n
Telefon:		$telefon
E-Mail:		$email\n
Betrag:		$betrag
Bemerkung:		$bemerkung";
	$message = "$todayis [EST] \n
Gutschein:\n$text";
	$from = "From: $email\r\n";
	if (strstr($message,"Content-Type")) {
		die();
	} else {
		if ($myemail != "")
			mail($myemail, $subject, $message, $from);
		if ($ccx != "")
			mail($ccx, $subject, $message, $from);
	}
	header("Location: gutschein_bestellen_thanks.html");
	?>
</body>
</html>