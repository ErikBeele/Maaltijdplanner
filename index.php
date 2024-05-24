<!DOCTYPE html>

<head>
<title>Maaltijdplanner</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="form.css">
</head>

<body>
    <div class="box">
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

<div class= "form">
    <form action="gerechten.php" method="POST">
      <label for="gerecht">Titel:</label><br>
      <select id="gerecht" name="gerecht"><br>
      <option value="vlees">Vlees</option>
      <option value="vis">Vis</option>
      <option value="vegatarisch">Vegatarisch</option>
    </form>
</div>
   
<footer>
    Contactgegevens: 175777@student.horizoncollege.nl
</footer>
    </div>
</body>



</html>
