<html>
    
    <?php 
    include("declaration.php");
    $filiere=$_GET['filiere'];
    $nom=$_GET['nom'];
    $prenom=$_GET['prenom'];?>
    
    <form method="post" action='uv_page3.php'>
        <select multiple name="TM">
           
            <?php
             foreach ($isi[$filiere][TM] as $key => $value) {
                 echo'<input type=\'checkbox\' name=TM'.$key.' value='.$value.'>'.$value.'</input>';
             }
       
            ?>
        </select> 
     
        <input type='hidden' name='nom' value=<?php echo $nom; ?> />
        <input type='hidden' name='prenom' value=<?php echo $prenom; ?> />
        <input type='hidden' name='filiere' value=<?php echo $filiere; ?> />
        <input type='submit' name='Valider'>
        
        
    </form>
    
</html>