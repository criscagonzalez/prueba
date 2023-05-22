<?php
    session_start();
    date_default_timezone_set('America/Bogota');  
    require_once('../modulos/config.php');

    mb_internal_encoding("UTF-8");

    //-------------------------------------------------
    //---- VALIDAR SI INICIO SESION USUARIO ----------
    //-------------------------------------------------
    if
    (
        isset($_SESSION['usuario']) != ''
    )
    {
        //echo "sesion iniciada";
        
        //-------------------------------------------------
        //------------ AGREGAR NUEVO ELENCO ------------------
        //-------------------------------------------------
        if 
        (    
            isset($_POST['popup_agregar_elenco_actor']) &&
            isset($_POST['popup_agregar_elenco_pelicula'])
        )
        {
            //echo "agregar";

            $query = "INSERT INTO `elenco` (`id`, `id_pelicula`, `id_actor`, `usuario_crea`, `fecha_creacion`) VALUES (NULL, '".$_POST['popup_agregar_elenco_pelicula']."', '".$_POST['popup_agregar_elenco_actor']."','".$_SESSION['id']."', TIMESTAMP('".date('Y-m-d')."', '".date('H:i:s')."'))";
            $result = mysqli_query($connection,$query);

            $query = "SELECT id, id_actor, id_pelicula, usuario_crea FROM elenco WHERE id_actor = '".$_POST['popup_agregar_elenco_actor']."' AND id_pelicula = '".$_POST['popup_agregar_elenco_pelicula']."' AND usuario_crea = '".$_SESSION['id']."'";
            $query = mysqli_query($connection,$query);
            $query = mysqli_fetch_array($query);
    
            echo json_encode($query);
        }
        //-------------------------------------------------
        //----- BORRAR ELENCO -----------
        //-------------------------------------------------
        if 
        (   
            isset($_POST['popup_borrar_elenco_ide'])
        )
        {
            //echo "borrar";
            
            $query = "DELETE FROM elenco WHERE id = ".$_POST['popup_borrar_elenco_ide'];
            $query = mysqli_query($connection,$query);

            $query = "SELECT id FROM elenco WHERE id  = '".$_POST['popup_borrar_elenco_ide']."'";
            $query = mysqli_query($connection,$query);
            $query = mysqli_fetch_array($query);
    
            echo json_encode($query);
        }
    }
    else
    {
        echo "no ha iniciado sesion";
    }
?>
