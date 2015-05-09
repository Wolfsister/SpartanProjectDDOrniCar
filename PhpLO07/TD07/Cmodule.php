<?php
require_once './WBinterface.php';
class Cmodule implements WBinterface {

    private $sigle;
    private $label;
    private $categorie;
    private $effectif;
    private $listeErreurs = array();

    function getSigle() {
        return $this->sigle;
    }

    function getLabel() {
        return $this->label;
    }

    function getCategorie() {
        return $this->categorie;
    }

    function getEffectif() {
        return $this->effectif;
    }

    function setSigle($sigle) {
        $this->sigle = $sigle;
    }

    function setLabel($label) {
        $this->label = $label;
    }

    function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    function setEffectif($effectif) {
        $this->effectif = $effectif;
    }

    function __construct($sigle, $label, $categorie, $effectif) {
        $this->setSigle($sigle);
        $this->setCategorie($categorie);
        $this->setEffectif($effectif);
        $this->setLabel($label);
        $this->listeErreurs=array();
    }
    function getListeErreurs() {
        return $this->listeErreurs;
    }

    function setListeErreurs($listeErreurs) {
        $this->listeErreurs = $listeErreurs;
    }

    function __toString() {
        return ">>Cmodule ($this->sigle,$this->label,$this->categorie,$this->effectif)<br />\n";
    }

    public function pageKO() {
        echo("<h2>Votre formulaire n'est pas correst </h2>");
        foreach ($this->listeErreurs as $key => $value) {
            echo("$key => $value <br/>\n");
        }
    }

    public function pageOK() {
        echo ("<h2>Votre formulaire est correct</h2>");
        foreach ($_GET as $key => $value) {
            echo("$key=>$value <br />\n");
        }
    }

    public function sauveBDR($base) {
        $resultat = "insert into" . $base . "value (";
        $resultat = "'" . $this->sigle . "',";
        $resultat = "'" . $this->label . "',";
        $resultat = "'" . $this->categorie . "',";
        $resultat = "'" . $this->effectif . "')";
        return $resultat;
    }

    public function sauveTXT() {
        $resultat = $this->sigle . ";";
        $resultat = $this->label . ";";
        $resultat = $this->categorie . ";";
        $resultat = $this->effectif . ";";
        return $resultat;
    }

    public function sauveXML($file) {
        return "xml";
    }

    public function valide() {
        $resultat = TRUE;
        $sigle = filter_input(INPUT_GET, "sigle", FILTER_SANITIZE_STRING);
        echo ("?? [$sigle]<br/>\n");
        if (strlen($sigle) == 0) {
            $resultat = FALSE;
            $this->listeErreurs["sigle"] = "Sigle n'est pas défini.";
        }
        return $resultat;
    }

}

?>