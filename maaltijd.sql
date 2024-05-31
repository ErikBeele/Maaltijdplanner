Create DATABASE Maaltijdplanner;

USE Maaltijdplanner;

Create TABLE Gerechten (
    ID int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (ID),
    titel Varchar(255) NOT NULL,
    type ENUM('vlees', 'vis', 'vegatarisch') NOT NULL,
    ingrediënten text NOT NULL,
    tijd int NOT NULL,
    rating int
)

