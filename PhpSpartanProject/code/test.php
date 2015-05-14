<?php
$title='Test';
include '../pagetype/hautPage.php';
?>

<p>
<?php

//$tab=array("user"=>(array("pseudo"=>"Admin","motdepasse"=>"admin")));
//echo '<pre>';
//print_r($tab);
//echo '</pre>',
//$tabRes=searchInDataBase($tab);
//print_r($tabRes);

//    createIDCar();

//$co=  connexionBdd();
//$requete= "SELECT idUser FROM user WHERE user.email='denis.chenesseau@gmail.com'";
//$query=mysqli_query($co, $requete);
//$tabQuery=mysqli_fetch_array($query);
//echo $tabQuery['idUser'];


    $pseudo='Admin';
    getIdUserByPseudo($pseudo);
?>
    
      
</p>



<?php
include '../pagetype/basPage.php';
?>