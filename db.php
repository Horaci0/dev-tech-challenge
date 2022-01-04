<?php

$pdo = new PDO('mysql:host=localhost;dbname=wcs;charset=utf8', 'root', 'root');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Pour afficher les erreurs SQL

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // Pour travailler avec les objets au lieu des tableaux quand on récupère les résultats d'une requête