<?php
interface WBinterface{
    public function valide();
    public function pageKO();
    public function pageOK();
    public function sauveTXT();
    public function sauveXML($file);
    public function sauveBDR($base);
}

?>
