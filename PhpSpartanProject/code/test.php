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


    $test=  aUneVoiture('2');
    if($test==true){ echo 'Oui';}else{echo 'Non'; }
    
?>
    
      
</p>



<?php
include '../pagetype/basPage.php';
?>