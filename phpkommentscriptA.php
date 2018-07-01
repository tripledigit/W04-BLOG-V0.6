<?php

//maak een tijd-variabele met opmaak
$tijda=time();
$tijdb=(date("D-d-M-Y-H:i",$tijda));

          //lees het nummer van de submitbutton.
          //zo weet ik bij welk blog deze reactie moet komen
          $tela = $_POST["nummer"];

          //lees de invoer van het reactie-tekstinvoerveld
          $komments = $_POST["kommentinvoer"];

          //negeer het block bestand, want ik ben ADMIN
          $block = "JA";

          //test of kommentaren zijn toegestaan
          if($block == "JA") {
          //open het juiste kommentaar-reactie bestand en voeg het kommentaar toe
          $kommentaarnr = fopen("Blogfileb/komment" . $tela . ".txt", "a");
          fwrite($kommentaarnr, $tijdb . "\n" . "<br>" . $komments . "\n" . "<br>");
          fclose("$kommentaarnr");
          //of echo de tekst en doe verder niets
              }     else {  echo "Reacties uitgeschakeld";
          }

//zet de inhoud van het kommentaar bestand op scherm
$test = (file_get_contents("Blogfileb/komment" . $tela . ".txt"));
echo $test;

?>
<!DOCTYPE html>
<html>
  <body>
    <p>Klik om naar de <a href="bloglees_formL.php">LEDEN LEESPAGINA</a> te gaan!</p><br>
    <p>Klik om naar de <a href="bloglees_formA.php">ADMIN LEES PAGINA</a> te gaan!</p>
    <br><br>
  </body>
</html>
