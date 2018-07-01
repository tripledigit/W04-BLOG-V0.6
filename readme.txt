welkom.html:
Bezoekers kunnen door naar de leespagina.
Of een account aanmaken.
Leden kunnen inloggen.
Admin kan inloggen.

inloggen.php:
Hier worden inloggegevens verwerkt en nieuwe accounts aangemaakt.

index_form.txt: 
Bevat de naam-, titel- en blogtekst- invoervelden met opmaak.
Alleen voor Admin

blogjs.js:
Tekst opmaak en submit functie. script is javascript.

phpblogscript.php:
Hier worden de blogteksten voorzien van een time-stamp, een kommentaar-on/off token en worden dan elk in een aparte file met opeenvolgend nummer gezet
In de files blockX.txt (de X is het volgnummer) komt JA of NEE te staan zo is te zien of reacties zijn toegestaan.
Voor elk blog wordt een kommentX.txt bestand (de X is het volgnummer) aangemaakt waarin later de kommentaren worden gezet.
Het laatst gebruikte nummer wordt in telbestand.txt gezet en wordt gebruikt om de telstand bij te houden.
Alleen voor Admin.

bloglees_form.php:
Hier kunnen de blogs en de kommentaren worden gelezen.
Van deze file zijn er 3:
bloglees_formB.php, bezoekers, kunnen geen recties plaaatsen
bloglees_formL.php, leden, kunnen reacties plaatsen bij een blog, als dit is toegestaan.
bloglees_formA.php, Admin, kan altijd reacties plaatsen. Gaat meer functionaliteit krijgen in de toekomst.

phpkommentscript.php:
Hier worden, als toegestaan, reacties verwerkt en weggeschreven in kommentX.txt
phpkommentscriptA.php:
Hier worden reacties verwerkt en weggeschreven in kommentX.txt
Alleen voor Admin.

folders:
Blogfileb bevat:
X.txt
kommentX.txt
blockX.txt
telbestand.txt
gebruikers.txt
wachtwoord.txt




