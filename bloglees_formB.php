<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BLOGuitvoer</title>
    <!--<script src = "blogjs.js"></script>-->
</head>
  <body>
     <p>Klik om naar <a href="welkom.html">Blog Welkom Pagina</a> te gaan</p><br>
     <h1>BLOGuitvoer v0.4-Bezoekers</h1><br><br><br>


<?php

          //lees de telstand uit het telbestand en echo de inhoud van de bijbehorende blog- en kommentaar bestanden naar de pagina
          $tela = (file_get_contents("Blogfileb/telbestand.txt"));
          while ($tela > 0) {
                $output = (file_get_contents("Blogfileb/" . $tela . ".txt"));
                $outputk = (file_get_contents("Blogfileb/komment" . $tela . ".txt"));
                echo $output;
                echo "<h3> Reacties: </h3>";
                echo $outputk. "<br>";
          --$tela;
          }
?>
    <br><br>
    <p>Klik om naar <a href="welkom.html">Blog Welkom Pagina</a> te gaan</p>
  </body>
</html>