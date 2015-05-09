<?php
include 'declaration.php';

echo $_POST['nom'].'<br />';
echo $_POST['prenom'].'<br />';
echo $_POST['filiere'].'<br />';
echo 'Liste TM <br />';
print_r($_POST['TM']);
echo '<br />';
echo 'Liste CS <br />';
print_r($_POST['CS']);

?>