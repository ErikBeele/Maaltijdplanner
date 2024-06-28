--Als er al een database genaamd "Maaltijdplanner" al bestaat wordt die verwijderd
DROP DATABASE IF EXISTS `Maaltijdplanner`;

--Database "Maaltijdplanner" word gecreeërd
Create DATABASE Maaltijdplanner;

--Zorgt ervoor dat database "Maaltijdplanner" wordt gebruikt
USE Maaltijdplanner;

--Creeërt tabel "Gerechten" met ID, titel, type, 6 ingrediënten, bereidingstijd en de rating
Create TABLE Gerechten (
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    titel Varchar(255) NOT NULL,
    type ENUM('vlees', 'vis', 'vegetarisch') NOT NULL,
    ingrediënt1 text NOT NULL,
    ingrediënt2 text NOT NULL,
    ingrediënt3 text NOT NULL,
    ingrediënt4 text NOT NULL,
    ingrediënt5 text NOT NULL,
    ingrediënt6 text NOT NULL,
    tijd int NOT NULL,
    rating int
)

