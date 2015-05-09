<?php

function listJour() {
    $listeJours = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi');
    return $listeJours;
}

function listMois() {
    $listeMois = array('Janvier', 'Février', 'Mars', 'Avril', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    return $listeMois;
}

function listHeures() {
    $listHeures = array();
    for ($h = 8; $h < 18; $h++) {
        for ($m = 0; $m < 60; $m = $m + 20) {
            if ($m == 0) {
                $listHeures[] = $h . 'h00';
            } else {
                $listHeures[] = $h . 'h' . $m;
            }
        }
    }
    return $listHeures;
}

function listSalles() {
    $listSalles = array('SO04', 'P204', 'A207', 'T115', 'T216');
    return $listSalles;
}

function listNumJour(){
    $tabNumJour=array();
    for($i=1;$i<=31;$i++){
        $tabNumJour[]=$i;
    }  
    return $tabNumJour;
}

function formulaire_select($tab,$intitule){
    //echo ('<p/><label>'.$intitule.' ?</label>');
    echo('<select name='.$intitule.'>');
    foreach ($tab as $value) {
        echo ($intitule='<option value='.$value.'>'.$value.'</option>');
    }       
    echo ('</select>');   
}

function buttonsResetSend(){
    echo '<p/><input type="submit" name="Valider">
            <input type="reset" name="Reset">';
}

function persistance($nomfichieracreer){
//    touch('test.csv');
//    $nomfichier=$nomfichieracreer.'.csv';
//    $fichier=  fopen('test.csv', 'w+');
//    $infos=array($_POST['Jour'],$_POST['NumJour'],$_POST['Mois'],$_POST['Heure'],$_POST['Salle']);
//    print_r($infos);
//    foreach ($infos as $value){
//        fputcsv($fichier, $infos);    
//    }
//    
//    print_r($infos);
//    
//    $url='../TD01/TD01_exo1.html';
//     header("Location:$url");
    $url='./EnregistrementsCSV/'.$nomfichieracreer;
    $infos=array($_POST['Jour'],$_POST['NumJour'],$_POST['Mois'],$_POST['Heure'],$_POST['Salle']);
    file_put_contents($url, $infos, FILE_APPEND);
     
}


?>


                   