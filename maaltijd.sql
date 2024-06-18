Create DATABASE Maaltijdplanner;

USE Maaltijdplanner;

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

