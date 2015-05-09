<!DOCTYPE html>

<html>
    <head>
        <title>TD04_exo1_contact_action LO07</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h2>Coordonnées :</h2>
        <ul>
        <?php
        printf("<li>Nom : %s </li>", $_GET["nom"]);
        printf("<li>Prénom : %s </li>", $_GET["prenom"]);
        printf("<li>Email : %s </li>", $_GET["email"]);
        printf("<li>Login : %s </li>", $_GET["login"]);
        printf("<li>Password : %s </li>", $_GET["password"]);
        printf("<li>Date de Naissance : %s </li>", $_GET["datenaissance"]);
        printf("<li>Groupe Préféré : %s </li>", $_GET["bestband"]);
        ?>
       </ul>     
        
    </body>
</html>



