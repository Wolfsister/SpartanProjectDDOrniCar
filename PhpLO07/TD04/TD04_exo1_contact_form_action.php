<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TD04_exo1_contact_form_action LO07</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h2>Laissez vos coordonnées !</h2>
        <form method="get" action = 'TD04_exo1_contact_form_action.php'>
            <?php 
            
            if(!empty($_GET)){
                
                $erreur=false;
                if(empty($_GET["nom"])){
                    echo("Le champ nom est vide.<br/>");
                    $erreur=true;
                }
                if(empty($_GET["prenom"])){
                    echo("Le champ prenom est vide.<br/>");
                    $erreur=true;
                }
                if(empty($_GET["email"])){
                    echo("Le champ email est vide. <br/>");
                    $erreur=true;
                }
                if(empty($_GET["login"])){
                    echo("Le champ login est vide. <br/>");
                    $erreur=true;
                }
                if(empty($_GET["password"])){
                    echo("Le champ password est vide.<br/>");
                    $erreur=true;
                }
                if(empty($_GET["datenaissance"])){
                    echo("Le champ date de naissance est vide.<br/>");
                    $erreur=true;
                }
                if(empty($_GET["bestband"])){
                    echo("Le champ -Best Band- est vide.<br/>");
                    $erreur=true;
                }
                
                if($erreur==false){
                    printf("<li>Nom : %s </li>", $_GET["nom"]);
                    printf("<li>Prénom : %s </li>", $_GET["prenom"]);
                    printf("<li>Email : %s </li>", $_GET["email"]);
                    printf("<li>Login : %s </li>", $_GET["login"]);
                    printf("<li>Password : %s </li>", $_GET["password"]);
                    printf("<li>Date de Naissance : %s </li>", $_GET["datenaissance"]);
                    printf("<li>Groupe Préféré : %s </li>", $_GET["bestband"]);
                }else{
                    printf("<a href='TD04_exo1_contact_form_action.php'> Retour </a>");
                }
            }else{
                
             
            ?>
            
            <p/><label>Nom</label>
            <input type="text" name="nom" />
            <p/><label>Prénom</label>
            <input type="text" name="prenom" value="Denis" />
            <p/><label>Email</label>
            <input type="text" name="email" />
            <p/><label>Login</label>
            <input type="text" name="login" />
            <p/><label>Password</label>
            <input type="password" name="password" />
            <p/><label>Date de Naissance</label>
            <input type=datetime name="datenaissance">
            <p/><label>Best Band ?</label>
            <select name="bestband">
                <optgroup label="En Activité" >
                    <option value="stones">The Rolling Stones</option>
                    <option value="monkeys">Arctic Monkeys</option>
                    <option value="keys">The Black Keys</option>
                    <option value="foo">Foo Fighters</option>
                </optgroup>
                <optgroup label="Dead...">
                    <option value="zeppelin">Led Zeppelin</option>
                    <option value="queen">Queen</option>
                    <option value="skynyrd">Lynyrd Skynyrd</option>
                </optgroup>
            </select> 

            <p/><input type="submit" name="Valider">
            <input type="reset" name="Reset">
        </form>
        <?php
            }
        ?>    
    </body>
</html>
