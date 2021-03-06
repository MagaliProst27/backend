<?php

class ModeleAddress
{
    private $idc;
    private function connexion()
    {

        $this->idc = new PDO("mysql:host=localhost;  dbname=menuiz-jo", 'root', '');
    }

    //Fonction pour afficher une adresse par rapport à son identifiant
    public function RecupAddressById($id)
    {
        $this->connexion();
        $res = $this->idc->prepare("SELECT ADR.* FROM T_D_ADDRESS_ADR ADR 
                where ADR_ID= " . $id . "");
        $res->execute();
        return $res;
    }

    //Fonction pour afficher les adresses par rapport à l'utilisateur
    public function RecupAddressByUser($usrid)
    {
        $this->connexion();
        $query="
        select ohr.usr_id,
            adr.*,
            adr_firstname + ' ' + adr_lastname  + CHAR(13) +
            adr_line1 + CHAR(13) + adr_line2 + CHAR(13) +
            adr_line3 + CHAR(13) + 
            adr_zipcode + ' ' + adr_city + CHAR(13)
            + adr_country as completadress
        from t_d_address_adr adr 
        inner join t_d_orderheader_ohr ohr on adr.ADR_ID=ohr.ADR_ID_FAC 
        where usr_id=" . $usrid . "
        union
        select ohr.usr_id,
            adr.*,
            adr_firstname + ' ' + adr_lastname  + CHAR(13) +
            adr_line1 + CHAR(13) + adr_line2 + CHAR(13) +
            adr_line3 + CHAR(13) + 
            adr_zipcode + ' ' + adr_city + CHAR(13)
            + adr_country as completadress
        from t_d_address_adr adr 
        inner join t_d_orderheader_ohr ohr on adr.ADR_ID=ohr.ADR_ID_liv  
        where  USR_ID=" . $usrid . "
        union 
        select usr.usr_id, 
            adr.*,
            adr_firstname + ' ' + adr_lastname  + CHAR(13) +
            adr_line1 + CHAR(13) + adr_line2 + CHAR(13) +
            adr_line3 + CHAR(13) + 
            adr_zipcode + ' ' + adr_city + CHAR(13)
            + adr_country as completadress
        from t_d_address_adr adr 
        inner join t_d_user_usr usr on adr.ADR_ID=usr.ADR_ID  
        where  USR_ID= " . $usrid . ";";
        $res = $this->idc->prepare($query);
        $res->execute();
        return $res;
    }



    public function InsertAddress($firstname, $lastname,
     $line1, $line2,$line3,
     $zipcode,$city,$country,
     $mail,$phone)
    {
        $this->connexion();
        $query = 'INSERT INTO T_D_ADDRESS_ADR
        ( 
            ADR_FIRSTNAME,
            ADR_LASTNAME,
            ADR_LINE1,
            ADR_LINE2,
            ADR_LINE3,
            ADR_ZIPCODE,
            ADR_CITY,
            ADR_COUNTRY,
            ADR_MAIL,
            ADR_PHONE)
         VALUES (
            :firstname,
            :lastname,
            :line1,
            :line2  ,:line3,
            :zipcode,
            :city,
            :country ,
            :mail,
            :phone 
        )'; 

        $stmt = $this->idc->prepare($query);
        $stmt->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':line1' => $line1,
            ':line2' => $line2,
            ':line3' => $line3,
            ':zipcode' => $zipcode,
            ':city' => $city,
            ':country' => $country,
            ':mail' => $mail,
            ':phone' => $phone
        ]);

        // on retourne le dernier id
        return $id = $this->idc->lastInsertId();;
    }

  
}
?>

