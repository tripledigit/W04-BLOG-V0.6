<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BLOGuitvoer</title>
    <!--<script src = "blogjs.js"></script>-->
</head>
  <body>
     <p>Klik om naar <a href="index_form.html">Blog Admin Pagina</a> te gaan</p><br>
     <p>Klik om naar <a href="welkom.html">Blog welkom Pagina</a> te gaan</p><br>
     <h1>BLOGuitvoer v0.4-Leden</h1><br><br><br>


<?php

          //lees de telstand uit het telbestand en echo de inhoud van de bijbehorende blog- en kommentaar bestanden naar de pagina
          $tela = (file_get_contents("Blogfileb/telbestand.txt"));
          while ($tela > 0) {
                $output = (file_get_contents("Blogfileb/" . $tela . ".txt"));
                $outputk = (file_get_contents("Blogfileb/komment" . $tela . ".txt"));
                $block = (file_get_contents("Blogfileb/block" . $tela . ".txt"));
                echo $output;
                echo "<h3> Reacties: </h3>";
                echo $outputk. "<br>";
                //reactie button voor admin want admin kan ALTIJD reageren
                echo  "<form id=\"komment$tela\" name=\"komment$tela\" class = \"komment$tela\" action=\"phpkommentscriptA.php\" method=\"post\"> <br>
                      Artikelnummer-$tela <br>
                      Reageer op dit artikel: <br>
                      <input type = \"hidden\"  id=\"nummer\" name=\"nummer\" value=\"$tela\">
                      <textarea  id=\"kommentinvoer\" name=\"kommentinvoer\" cols=\"30\" rows=\"8\" ></textarea>
                      <br><br> <input type = \"button\" onclick = \"submit()\" value = \"Verstuur\"> </form> <br><br>";
                --$tela;
}

?>
    <br><br>
    <p>Klik om naar <a href="index_form.html">Blog Admin Pagina</a> te gaan</p>
    <p>Klik om naar <a href="welkom.html">Blog welkom Pagina</a> te gaan</p><br>
  </body>
</html>
