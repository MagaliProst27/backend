<?php

class ModeleKit
{
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
    }

    function recupKitbyId($id)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT PRD.*, ");
        $res->execute();
        return $res;
    }
}

?>