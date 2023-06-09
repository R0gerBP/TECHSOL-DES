<?php

class Ticket extends Conectar{

    public function insert_ticket($id_usu,$id_cat,$tick_titulo,$tick_descrip){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO tm_ticket (id_tick,id_usu,id_cat,tick_titulo,tick_descrip,est) VALUES (NULL,?,?,?,?,1)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id_usu);
        $sql->bindValue(2, $id_cat);
        $sql->bindValue(3, $tick_titulo);
        $sql->bindValue(4, $tick_descrip);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

}
?>
