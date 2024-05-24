<!DOCTYPE html>

<head>
<title>Maaltijdplanner</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="navbar.css">
</head>

<body>
   <header>
    <nav>
        <img src="logo.png" alt="websitelogo">
        <ul>
            <li><a href="#">Gerechten</a></li>
            <li><a href="#">Maaltijden</a></li>
            <li><a href="#">Aanbiedingen</a></li>
            <li><a href="#">ingrediënten</a></li>
            <li><a href="#">klantenservice</a></li>
        </ul>
        <img src="list.png" alt="yourlist">
        <img src="profile.png" alt="profile">
    </nav>
   </header>

<form action="gerechten.php" method="POST">
      <label for="titelserie">Titel:</label><br>
      <input type="text" id="titel" name="titel"><br>
      <label for="rating">Rating:</label><br>
      <input type="text" id="rating" name="rating"><br>
      <label for="beschrijving">Beschrijving:</label><br>
      <input type="text" id="beschrijving" name="beschrijving"><br>
      <label for="awards">ingrediënten:</label><br>
      <input type="text" id="ingrediënten" name="ingrediënten"><br>
      <input type="button" value="send">

</form>
   
</body>

<footer>
    Contactgegevens:
</footer>

</html>
