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
        //------------ REGISTRAR NUEVA ACTOR ------------------
        //-------------------------------------------------
        if 
        (    
            isset($_POST['popup_crear_actor_nomb'])
        )
        {
            //echo "crear";

            $query = "INSERT INTO `actores` (`id`, `estado`, `nombres`, `usuario_crea`, `fecha_creacion`) VALUES (NULL, 'S', '".strtoupper($_POST['popup_crear_actor_nomb'])."','".$_SESSION['id']."', TIMESTAMP('".date('Y-m-d')."', '".date('H:i:s')."'))";
            $result = mysqli_query($connection,$query);

            $query = "SELECT id, nombres, usuario_crea FROM actores WHERE nombres = '".strtoupper($_POST['popup_crear_actor_nomb'])."' AND usuario_crea = '".$_SESSION['id']."'";
            $query = mysqli_query($connection,$query);
            $query = mysqli_fetch_array($query);
    
            echo json_encode($query);
        }
        //-------------------------------------------------
        //------------ CONSULTAR ACTOR ------------------
        //-------------------------------------------------
        if 
        (    
            isset($_POST['popup_actor_ide'])
        )
        {
        
            mb_internal_encoding("UTF-8");

            $query = "SELECT id, nombres FROM actores WHERE id = '".$_POST['popup_actor_ide']."'";
            $query = mysqli_query($connection,$query);
            $query = mysqli_fetch_array($query);

            echo json_encode($query);
        }
        //-------------------------------------------------
        //------------ MODIFICA UNA ACTOR ----------------
        //-------------------------------------------------
        if 
        (   
            isset($_POST['popup_modifica_actor_ide']) && 
            isset($_POST['popup_modifica_actor_nomb'])
        )
        {
            //echo "crear";

            $query = "UPDATE actores SET nombres = '".strtoupper($_POST['popup_modifica_actor_nomb'])."', usuario_modifica = '".$_SESSION['id']."', fecha_modificacion = TIMESTAMP('".date('Y-m-d')."', '".date('H:i:s')."') WHERE id = ".$_POST['popup_modifica_actor_ide'];
            $query = mysqli_query($connection,$query);

            $query = "SELECT id, nombres FROM actores WHERE nombres = '".strtoupper($_POST['popup_modifica_actor_nomb'])."' AND usuario_modifica = '".$_SESSION['id']."' AND id = '".$_POST['popup_modifica_actor_ide']."'";
            $query = mysqli_query($connection,$query);
            $query = mysqli_fetch_array($query);
    
            echo json_encode($query);
        }
        //-------------------------------------------------
        //----- DESACTIVAR / ACTIVAR UN ACTOR -----------
        //-------------------------------------------------
        if 
        (   
            isset($_POST['popup_desactivar_actor_ide'])
        )
        {
            //echo "desactivar/activar";
            
            $query = "SELECT id, estado FROM actores WHERE id = '".$_POST['popup_desactivar_actor_ide']."'";
            $query = mysqli_query($connection,$query);
            $query = mysqli_fetch_array($query);

            switch($query['1'])
            {
                case "S":
                    $nestado = 'N';
                break;
                case "N":
                    $nestado = 'S';
                break;
            }

            $query = "UPDATE actores SET estado = '$nestado', usuario_modifica = '".$_SESSION['id']."', fecha_modificacion = TIMESTAMP('".date('Y-m-d')."', '".date('H:i:s')."') WHERE id = ".$_POST['popup_desactivar_actor_ide'];
            $query = mysqli_query($connection,$query);

            $query = "SELECT id, estado FROM actores WHERE estado = '$nestado' AND id = '".$_POST['popup_desactivar_actor_ide']."'";
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
