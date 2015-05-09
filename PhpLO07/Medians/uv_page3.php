<html>
    
    <?php 
    include("declaration.php");
    $filiere=$_POST['filiere']; 
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $TM=$_POST['TM'];
    ?>
    
    <form method="post" action='uv_page4.php'>
           
            <?php
             foreach ($isi[$filiere][CS] as $key => $value) {
                 echo'<input type=\'checkbox\' name=CS'.$key.' value='.$value.'>'.$value.'</input>';
             }
       
            ?>

        <input type='hidden' name='nom' value=<?php echo $nom; ?> />
        <input type='hidden' name='prenom' value=<?php echo $prenom; ?> />
        <input type='hidden' name='filiere' value=<?php echo $filiere; ?> />
        <input type='hidden' name='TM' value=<?php echo $TM; ?> />
        <input type='submit' name='Valider'>
        
        
    </form>
    
</html>