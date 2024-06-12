<<html>
    <form action="succes.php" method="POST">
        <label for="titel">Titel:</label><br>
        <input type="text" id="titel" name="titel"><br>
        <label for="gerecht">Soort gerecht:</label><br>
        <select id="gerecht" name="gerecht">
            <option value="">is het gerecht vlees, vis of vegetarisch?</option>
	        <option value="vlees">Vlees</option>
	        <option value="vis">Vis</option>
	        <option value="vegetarisch">Vegetarisch</option>
        </select>
        <label for="duur">Benodigde tijd:</label><br>
        <input type="int" id="tijd" name="tijd"><br>
        <label for="ingrediënt">Ingrediënten:</label><br>
        <input type="text" id="ingrediënt" name="ingrediënt"><br>
        <label for="rating">Rating:</label><br>
        <input type="text" id="rating" name="rating"><br>
        <input type="hidden" id="id" name="id"><br>
        <input type="submit" value="submit">
    </form>

</html>