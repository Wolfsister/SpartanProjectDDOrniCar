<?php
class Cdictionnaire{
    private $dico;
    
    function getDico() {
        return $this->dico;
    }

    function setDico($dico) {
        $this->dico = $dico;
    }
    function __construct($dico) {
        $this->dico = $dico;
    }
    
    function addVille($pays,$ville){
        $this->getDico()[$pays][]=$ville;
    }
            
    function affiche(){
        foreach($this->getDico() as $key->$value){
            echo 'Pays'.$key;
            $tabVilles=$value;
            foreach ($tabVilles as $key => $value) {
                echo $key.'-'.$value;                
            }
        }
    }


}


