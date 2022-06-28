<?php 
//fait par magali
 class ModeleSavFiles
{

 private $idc;
 private function connexion()
 {

     $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
 }
 public function RecupSavFilesById($id)
 {
     $this->connexion();
     $res = $this->idc->prepare("SELECT svf.*, SVF_ID from t_d_savefile_svf svf 
             where SVF_ID= " . $id . "");
     $res->execute();
     return $res;
 }

 public function RecupDateCreation($date) 
 {
  $res = $this-> idc ->prepare("SELECT svf.*, SVF_CREATIONTIME from t_d_savefile_svf svf where SVF_CREATIONTIME=" .$date."");
  $res->execute();
  return $res;
 }

 public function RecupComm($comm)
{

    $res= $this ->idc ->prepare("SELECT  svf.*, SVF_COMM from t_d_savefile_svf svf where SVF_COMM=" .$comm."");
    $res->execute();
    return $res;
}
public function RecupIP($ip)
{
$res=$this -> idc->prepare(" SELECT svf.*, SVF_IP from t_d_savefile_svf svf where SVF_IP=" .$ip."");
$res->execute();
return $res;

} 


}

?>