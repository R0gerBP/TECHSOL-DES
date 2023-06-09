<?php
    require_once("../config/conexion.php");
    require_once("../models/Ticket.php");
    $ticket = new Ticket();

    switch($_GET["op"]){
        case "insert":
            $id_usu = $_POST["id_usu"];
            $id_cat = $_POST["id_cat"];
            $tick_titulo = $_POST["tick_titulo"];
            $tick_descrip = $_POST["tick_descrip"];
    
            $ticket->insert_ticket($id_usu, $id_cat, $tick_titulo, $tick_descrip);
            break; 
    }
?>

