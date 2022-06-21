<?php 
class ModeleTypePaiement {

    
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz-jo", 'root', '');
    }

    private function RecupTypePaiementByID (){
        $this-> connection();
        
    }
}

?>