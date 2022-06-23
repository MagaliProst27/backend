<?php
include("infos.php");
class ModeleUser {
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz-jo", 'root', '');
    }

    //Fonction pour afficher un user par rapport à son identifiant
    public function RecupUser($id)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT USR.*,UTY_TYPE FROM T_D_USER_USR USR inner join T_D_USERTYPE_UTY UTY
on USR.UTY_ID=UTY.UTY_ID
 where USR_ID= " . $id . "");
        $res->execute();
        return $res;
    }

    //Fonction pour afficher un user par rapport à son mail
    public function RecupUserByMail($email)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT USR.*,UTY_TYPE  as 'role'  FROM T_D_USER_USR USR inner join T_D_USERTYPE_UTY UTY
    on USR.UTY_ID=UTY.UTY_ID
     where USR_MAIL= '" . $email . "'");
        $res->execute();
        return $res;
    }

    public function RecupPassword($password, $email)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT USR.*, UTY_TYPE as 'role' FROM t_d_user_usr USR 
        inner join t_d_usertype_uty uty
        on USR.UTY_ID=UTY.UTY_ID
        WHERE USR_PASSWORD=sha1('".$password."') AND USR_MAIL='".$email."'");
        
       
        $res->execute();
        return $res;
    }

    public function RecupPseudo($username,$id){
        $this->connexion();
        $res = $this->idc->prepare("SELECT username FROM T_D_USER_USR USR 
 where USR_ID= " . $id . " AND username=". $username."");
        $res->execute();
        return $res;
    }

}

?> 