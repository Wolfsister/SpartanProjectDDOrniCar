<?php

class Cville{
    private $nom;
    private $habitant;
    
    function getNom() {
        return $this->nom;
    }

    function getHabitant() {
        return $this->habitant;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setHabitant($habitant) {
        $this->habitant = $habitant;
    }
    function __construct($nom, $habitant) {
        $this->nom = $nom;
        $this->habitant = $habitant;
    }
    
    function __toString() {
        if($this->habitant>1){
            return "Ville : ".$this->nom.', '.$this->habitant." millions d'habitants.";
        }else{
            return "Ville : ".$this->nom.', '.$this->habitant." million d'habitants.";  
        }
    }

    

}

