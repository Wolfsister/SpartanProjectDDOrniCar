<?php
//On demarre les sessions
session_start();

/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'
espace membre puisse fonctionner correctement.
******************************************************/

//On se connecte a la base de donnee
mysql_connect('mysql.hostinger.fr', 'u885690161_orni', 'doriandenis');
mysql_select_db('u885690161_orni');

//Email du webmaster
$mail_webmaster = 'admin@admin.com';

//Adresse du dossier de la top site
$url_root = 'http://www.ornicar.esy.es';

?>