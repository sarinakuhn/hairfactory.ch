<?php
if(!isset($_POST['name']) || !isset($_POST['vorname']) || !isset($_POST['telefon']) || !isset($_POST['email'])) {
	header("Location: wallisellen_kontakt.html");
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
	$nachname = $_POST['nachname']; 
	$vorname = $_POST['vorname']; 
	$strasse_nr = $_POST['strasse_nr'];
	$plz_ort = $_POST['plz_ort'];
	$telefon = $_POST['telefon'];
	$email = $_POST['email']; 
	if($email == "")
		$email = "kuhn@alnovo.ch";
	$mitteilung = $_POST['mitteilung'];
	$myemail = "kuhn@alnovo.ch"; // E-Mail-Adresse, an welche Mail gesendet wird.
	$ccx = ""; 
	$todayis = date("l, F j, Y, g:i a") ;
	$subject = "Feedback von der Internetseite www.hairfactory.ch - Wallisellen"; 
	$text = stripcslashes($mitteilung); 
	$text = "$mitteilung \n
Name:			$name
Vorname:		$vorname
Strasse / Nr.:	$strasse_nr
PLZ / Ort:		$plz_ort\n
Telefon:		$telefon
E-Mail:		$email";
	$message = "$todayis [EST] \n
Nachricht:\n$text";
	$from = "From: $email\r\n";
	if (strstr($message,"Content-Type")) {
		die();
	} else {
		if ($myemail != "")
			mail($myemail, $subject, $message, $from);
		if ($ccx != "")
			mail($ccx, $subject, $message, $from);
	}
	header("Location: wallisellen_kontakt_thanks.html");
	?>
</body>
</html>