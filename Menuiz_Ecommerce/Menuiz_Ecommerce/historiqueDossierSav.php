<?php 
// fait par magali 
class historiqueSAV 
{
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
     
    }
public function numDossierSAV($id)
{
$res= $this->idc->prepare("SELECT HAV_ID from t_d_historysav_hav ");
$res->execute();
        return $res;
}

}
?>