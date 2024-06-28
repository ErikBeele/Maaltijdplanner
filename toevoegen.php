<!DOCTYPE html>

<!--Verbindt stylesheets met de index.php--->
<head>
<title>Maaltijdplanner</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="form.css">
</head>

<body>
    <div class="box">
   <header>
        <!---navbar zodat je makkelijk van pagina kan wisselen---->
    <nav>
        <ul>
            <li><a href="index.php">Kiezen</a></li>
            <li><a href="overzicht.php">Maaltijden</a></li>
            <li><a href="ingrediëntenlijst.php">ingrediëntenlijst</a></li>

        </ul>
    </nav>
   </header>

 <!---Een form zodat je zelf je eigen recepten kan toevoegen-->
    <form action="succes.php" method="POST">
        <label for="titel">Titel:</label><br>
        <input type="text" id="titel" name="titel"><br>
        <label for="type">is het gerecht vlees, vis of vegetarisch?</</label><br>
        <select id="type" name="type">
	        <option value="vlees">Vlees</option>
	        <option value="vis">Vis</option>
	        <option value="vegetarisch">Vegetarisch</option>
        </select><br>
        <label for="duur">Benodigde tijd in minuten:</label><br>
        <input type="int" id="tijd" name="tijd"><br>
        <label for="ingrediënt">Ingrediënt 1:</label><br>
        <input type="text" id="ingrediënt" name="ingrediënt"><br>
        <label for="ingrediënt2">Ingrediënt 2:</label><br>
        <input type="text" id="ingrediënt2" name="ingrediënt2"><br>
        <label for="ingrediënt3">Ingrediënt 3:</label><br>
        <input type="text" id="ingrediënt3" name="ingrediënt3"><br>
        <label for="ingrediënt4">Ingrediënt 4:</label><br>
        <input type="text" id="ingrediënt4" name="ingrediënt4"><br>
        <label for="ingrediënt">Ingrediënt 5:</label><br>
        <input type="text" id="ingrediënt5" name="ingrediënt5"><br>
        <label for="ingrediënt6">Ingrediënt 6:</label><br>
        <input type="text" id="ingrediënt6" name="ingrediënt6"><br>
        <label for="rating">Rating:</label><br>
        <input type="text" id="rating" name="rating"><br>
        <input type="hidden" id="id" name="id"><br>
        <input type="submit" value="submit">
    </form>

</html>