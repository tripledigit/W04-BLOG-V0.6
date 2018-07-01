<!DOCTYPE html>
<html>
  <body>
    <p>Klik op de link om terug te keren naar de <a href="welkom.html">Blog Start Pagina</a></p>
    <br><br>
    <h1>Blog inlog en registratie verwerking v0.1</h1><br>
  </body>
</html>

<?php

//geregistreerde gebruiker of admin login
$bekend = $_POST["bekend"];
$loginnaam=$_POST["naam"];
$loginww=$_POST["wachtw"];
//nieuwe registratie informatie
$nieuw = $_POST["nieuw"];
$regnaam=$_POST["naamb"];
$regwachtb=$_POST["wachtwb"];
$regwachtc=$_POST["wachtwbc"];

//Maak nieuw gebruikers bestand voor de 1e keer als deze nog niet bestaat en sluit weer
fopen("Blogfileb/gebruikers.txt", "a");
fclose("Blogfileb/gebruikers.txt");
//Maak nieuw wachtwoorden bestand voor de 1e keer als deze nog niet bestaat en sluit weer
fopen("Blogfileb/wachtwoord.txt", "a");
fclose("Blogfileb/wachtwoord.txt");

//lees gebruikers.txt en wachtwoord.txt in 2 variabelen
//en zet elk woord in arrays
$gebruikers = (file_get_contents("Blogfileb/gebruikers.txt"));
$namen = explode(" ", $gebruikers);
$wachtwoord = (file_get_contents("Blogfileb/wachtwoord.txt"));
$woorden = explode(" ", $wachtwoord);

//bepaal aantal namen in array en verlaag met 1 (geeft 1 te veel aan)
$len = count($namen);
  --$len;

//kijk of we met een nieuwe registratie te maken hebben en
//controleer ook of de naam en wachtwoord niet identiek zijn en geen spatie of lege string zijn
if($nieuw == "nieuw" AND ($regwachtc == $regnaam OR $regnaam == " " OR $regnaam == "")) {
  echo "Hallo, naam en wachtwoord mogen niet identiek en geen spatie of leeg zijn." ."<br>";
  echo "Probeer het nogmaals." ."<br>";
  echo "<p><a href=\"welkom.html\">Blog Start Pagina</a></p>";
}

//en kijk of wachtwoord 2 keer zelfde is
  if($nieuw == "nieuw" AND $regwachtb == $regwachtc) {
  //kijk of gebruikersnaam al bestaat
  for($num = 0; $num <= $len; $num++) {
    //kijk of de login gegevens bestaan en ook kloppen
    if($namen[$num] == $regnaam AND !($regwachtc == $regnaam OR $regnaam == " " OR $regnaam == "")) {
      echo "Hallo, helaas bestaat deze gebruikersnaam al." ."<br>";
      echo "Probeer het nogmaals met een andere gebruikers naam." ."<br>";
      echo "<p><a href=\"welkom.html\">Blog Start Pagina</a></p>";
      break 1;
        //gegevens kunnen worden ingevoerd want gebruikersnaam is uniek
      } if($namen[$num] !== $regnaam AND $regwachtc !== $regnaam) {
        $maakgebr = fopen("Blogfileb/gebruikers.txt", "a");
          fwrite($maakgebr, $regnaam . " ");
            fclose("Blogfileb/gebruikers.txt");
        $maakww = fopen("Blogfileb/wachtwoord.txt", "a");
          fwrite($maakww, $regwachtb . " ");
            fclose("Blogfileb/wachtwoord.txt");
            //welkom boodschap
            echo "Hallo " . $regnaam . ", welkom bij de club." . "<br>";
            echo "Je wachtwoord is: " . $regwachtb . "<br>";
            echo "Terug naar de beginagina en log in om te kunnen reageren op artikelen." . "<br>";
            echo "<p><a href=\"welkom.html\">Blog Start Pagina</a></p>";
            break 1;
    }
  }
}

//kijk of gebruiker wel bestaat:
//lees gebruikersnamen en wachtwoorden in 2 stringvariabelen
//en zet daarna de losse namen en wachtwoorden in 2 arrays
//$gebruikers = (file_get_contents("Blogfileb/gebruikers.txt"));
//$namen = explode(" ", $gebruikers);
//$wachtwoord = (file_get_contents("Blogfileb/wachtwoord.txt"));
//$woorden = explode(" ", $wachtwoord);

//bepaal aantal namen in array
$len = count($namen);
        --$len;

if($bekend == "bekend" AND $loginnaam == "Armandold" AND $loginww == "beniktemin"){
  echo "Hallo " . $loginnaam . ", de Admin die te min is !";
  //geef recht om blogtekst te maken: toegang tot index_form.html en blogleesformA.php
  echo "<p><a href=\"index_form.html\">Blog Admin Pagina</a></p>";
  echo "<p><a href=\"bloglees_formA.php\">Blog Admin Lees Pagina</a></p>";
}
        else {
        //zoek gebruikersnaam en positienummer op in array - wachtwoord heeft hetzelfde positienummer
        for($numr = 0; $numr <= $len; $numr++) {
            //kijk of de login gegevens bestaan en ook kloppen
            if($bekend == "bekend" AND $namen[$numr] == $loginnaam AND $woorden[$numr] == $loginww) {
                echo "Hallo " . $loginnaam . ", welkom terug !";
                //toegang tot bloglees_formL.html en geef recht om comments te posten
                echo "<p><a href=\"bloglees_formL.php\">Blog Leden Pagina</a></p>";
                break;
}
                //als niet gevonden, dan melding en terug naar welkom.html
                elseif ($bekend == "bekend" AND $numr >= $len) {
                  echo "Hallo " . $loginnaam . ", er is iets misgegaan.";
                  echo "<p><a href=\"welkom.html\">Blog Start Pagina</a></p>";
    }
  }
}


?>
<!DOCTYPE html>
<html>
  <body>
    <p>Klik op de link om terug te keren naar de <a href="welkom.html">Blog Start Pagina</a></p>
    <br><br>
  </body>
</html>
