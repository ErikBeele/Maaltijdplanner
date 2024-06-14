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
        <ul>
            <li><a href="overzicht.php">Maaltijden</a></li>
        </ul>
    </nav>
   </header>

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
        <label for="ingrediënt">Ingrediënten:</label><br>
        <input type="text" id="ingrediënt" name="ingrediënt"><br>
        <label for="rating">Rating:</label><br>
        <input type="text" id="rating" name="rating"><br>
        <input type="hidden" id="id" name="id"><br>
        <input type="submit" value="submit">
    </form>

</html>