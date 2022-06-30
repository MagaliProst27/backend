<?php
// fait par magali 
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
        $res = $this->idc->prepare("SELECT  PRD_ID, PRD_ID_COMPONENT,KIT_QUANTITY,PRD_CODE FROM t_d_product_prd INNER JOIN t_d_productkit_kit ON t_d_product_prd.PRD_ID= t_d_productkit_kit.PRD_ID_COMPONENT");
        $res->execute();
        return $res;

    }
    
}

?>