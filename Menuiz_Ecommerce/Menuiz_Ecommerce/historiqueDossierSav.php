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
    $this -> connexion();
$res= $this->idc->prepare("SELECT SVF_ID FROM `t_d_savfile_svf` SVF_ID= ".$id."");
$res->execute();
        return $res;
}

}
?>