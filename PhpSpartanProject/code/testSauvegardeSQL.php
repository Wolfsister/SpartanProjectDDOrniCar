<?php

$conn = new mysqli("localhost", "root", "", "testornicar");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br />";

$insertion = "INSERT INTO user (idUser, nom, prenom, pseudo, motdepasse, email, idVoiture, photo, note, solde, age) VALUES (NULL, 'NomTest', 'PrenomTest', 'Wolf', 'MDP', 'emailb', NULL, 'photob', NULL, '0', NULL)";
mysqli_query($conn, $insertion);

echo "OK";
?>