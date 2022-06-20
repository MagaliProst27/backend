<?php class ModelUsers {
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz", 'root', '');
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
    public function RecupUserByMail($mail)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT USR.*,UTY_TYPE  as 'role'  FROM T_D_USER_USR USR inner join T_D_USERTYPE_UTY UTY
    on USR.UTY_ID=UTY.UTY_ID
     where USR_MAIL= '" . $mail . "'");
        $res->execute();
        return $res;
    }

    public function RecupPseudo($username,$id){
        this->connexion();
        $res = $this->idc->prepare("SELECT username FROM T_D_USER_USR USR 
 where USR_ID= " . $id . " AND username=". $username."");
        $res->execute();
        return $res;
    }

}

?> 