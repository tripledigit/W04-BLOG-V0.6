<!DOCTYPE html>
<html>
  <body>
    <p>Blog post is gelukt!</p>
    <p>Klik op de link om terug te keren naar de <a href="bloglees_formA.php">Blog Admin Lees Pagina</a></p>
    <br><br>
  </body>
</html>

<?php

//pak stringvariabelen uit html en zet deze in PHP stringvariabelen
  $naama=$_POST["naam"];
  $blogtitela=$_POST["blogtitel"];
  $blogteksta=$_POST["blogtekstinvoer"];
  $blockj=$_POST[ja];
  $blockn=$_POST[nee];

//$block (standaard op NEE), geeft aan of kommentaren wel- of niet mogen.
  $block = "NEE";
  if($blockj=="JA"){
  $block = "JA";
}

//maak een tijd-variabele met opmaak
$tijda=time();
$tijdb=(date("D-d-M-Y-H:i",$tijda));


  //Controleer of de file corrct is ge-upload
	if($_FILES["file"]["error"] > 0) { echo "Fout tijdens uploaden, probeer opnieuw"; }

	//toegestane bestands-extensies
	$extsAllowed = array( "jpg", "jpeg", "png", "gif" );
	//pak de extensie van de file is ge-upload en maak lower-case
		//substr return ".jpg"
		//Strrchr return "jpg"
	$extUpload = strtolower( substr( strrchr($_FILES["file"]["name"], ".") ,1) ) ;
	//controleer of de file extensie toegestaan is
	if (in_array($extUpload, $extsAllowed) ) {
	//upload de file naar de server in map "uploads"
  //als dit niet lukt, geef dan een melding
    $name = "uploads/{$_FILES["file"]["name"]}";
	     $result = move_uploaded_file($_FILES["file"]["tmp_name"], $name);
	       if($result){echo "";}  //<img src='$name'/>
          } else { echo "Bestand is ongeldig. Probeer opnieuw"; }


//Maak telbestand aan als deze nog niet bestaat en sluit weer
fopen("Blogfileb/telbestand.txt", "a");
fclose("Blogfileb/telbestand.txt");
//lees inhoud telbestand in variabele, bij de 1e keer zal dit undefined zijn
$tela = (file_get_contents("Blogfileb/telbestand.txt"));

//verhoog de telstand met 1, als de waarde undefined is wordt hij hierdoor 1
$tela = $tela + "1" ;
//open telbestand met "w" zodat deze leeg gemaakt wordt voordat er geschreven wordt.
$teller = fopen("Blogfileb/telbestand.txt","w");
//zet de telwaarde in het telbestand
//-hiermee kan ik elke keer een genummerd kommentaarbestand koppelen aan het blognummer
fwrite($teller, $tela);
fclose("Blogfileb/telbestand.txt");


//Maak nieuw kommentaarbestand met gebruik van nummer in TELbestand en sluit weer
fopen("Blogfileb/komment" . $tela . ".txt", "a");
fclose("Blogfileb/komment" . $tela . ".txt");

//maak blokkeerbestand waarin JA of NEE komt te staan.
//kommentaren worden dan wel- of niet- opgeslagen
$blokkeer = fopen("Blogfileb/block" . $tela . ".txt", "a");
            fwrite($blokkeer, $block);
            fclose("Blogfileb/block" . $tela . ".txt");

    //schrijffunctie met opmaak: o.a. gegenereerde tijd, blogtekst en een tekstinvoerveld
    $schrijfweg = fopen("Blogfileb/" . $tela . ".txt", "a") or die("Kan bestand niet openen!");
    fwrite($schrijfweg,     "\n" . "<br>" . "Reacties aan? - " . $block
                          . " Blognummer: " . $tela . "\n" . "<br>"
                          . "Datum:" . " " . $tijdb . "\n" . "<br>"
                          . "Auteur:" . " " . $naama . "\n" . "<br>"
                          . "Onderwerp:" . " " . $blogtitela . "\n". "<br>"
                          . "<img src='$name'/>" . " " . "\n" . "<br>"
                          . $blogteksta . "\n" . "<br>");
    fclose($schrijfweg);

//zet de inhoud van het laatste blogfile op scherm
$naarhtmla = (file_get_contents("Blogfileb/" . $tela . ".txt"));
echo $naarhtmla;

?>

<!DOCTYPE html>
<html>
  <body>
    <p>Blog post is gelukt!</p>
    <p>Klik op de link om terug te keren naar de <a href="bloglees_formA.php">Blog Admin Lees Pagina</a></p>
  </body>
</html>
