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
        //------------ REGISTRAR NUEVA PELICULA ------------------
        //-------------------------------------------------
        if 
        (    
            isset($_POST['popup_crear_pelicula_nomb'])
        )
        {
            //echo "crear";

            $query = "INSERT INTO `peliculas` (`id`, `estado`, `nombres`, `usuario_crea`, `fecha_creacion`) VALUES (NULL, 'S', '".strtoupper($_POST['popup_crear_pelicula_nomb'])."','".$_SESSION['id']."', TIMESTAMP('".date('Y-m-d')."', '".date('H:i:s')."'))";
            $result = mysqli_query($connection,$query);

            $query = "SELECT id, nombres, usuario_crea FROM peliculas WHERE nombres = '".strtoupper($_POST['popup_crear_pelicula_nomb'])."' AND usuario_crea = '".$_SESSION['id']."'";
            $query = mysqli_query($connection,$query);
            $query = mysqli_fetch_array($query);
    
            echo json_encode($query);
        }
        //-------------------------------------------------
        //------------ CONSULTAR PELICULA ------------------
        //-------------------------------------------------
        if 
        (    
            isset($_POST['popup_pelicula_ide'])
        )
        {
        
            mb_internal_encoding("UTF-8");

            $query = "SELECT id, nombres FROM peliculas WHERE id = '".$_POST['popup_pelicula_ide']."'";
            $query = mysqli_query($connection,$query);
            $query = mysqli_fetch_array($query);

            echo json_encode($query);
        }
        //-------------------------------------------------
        //------------ MODIFICA UNA PELICULA ----------------
        //-------------------------------------------------
        if 
        (   
            isset($_POST['popup_modifica_pelicula_ide']) && 
            isset($_POST['popup_modifica_pelicula_nomb'])
        )
        {
            //echo "crear";

            $query = "UPDATE peliculas SET nombres = '".strtoupper($_POST['popup_modifica_pelicula_nomb'])."', usuario_modifica = '".$_SESSION['id']."', fecha_modificacion = TIMESTAMP('".date('Y-m-d')."', '".date('H:i:s')."') WHERE id = ".$_POST['popup_modifica_pelicula_ide'];
            $query = mysqli_query($connection,$query);

            $query = "SELECT id, nombres FROM peliculas WHERE nombres = '".strtoupper($_POST['popup_modifica_pelicula_nomb'])."' AND usuario_modifica = '".$_SESSION['id']."' AND id = '".$_POST['popup_modifica_pelicula_ide']."'";
            $query = mysqli_query($connection,$query);
            $query = mysqli_fetch_array($query);
    
            echo json_encode($query);
        }
        //-------------------------------------------------
        //----- DESACTIVAR / ACTIVAR UNA PELICULA -----------
        //-------------------------------------------------
        if 
        (   
            isset($_POST['popup_desactivar_pelicula_ide'])
        )
        {
            //echo "desactivar/activar";
            
            $query = "SELECT id, estado FROM peliculas WHERE id = '".$_POST['popup_desactivar_pelicula_ide']."'";
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

            $query = "UPDATE peliculas SET estado = '$nestado', usuario_modifica = '".$_SESSION['id']."', fecha_modificacion = TIMESTAMP('".date('Y-m-d')."', '".date('H:i:s')."') WHERE id = ".$_POST['popup_desactivar_pelicula_ide'];
            $query = mysqli_query($connection,$query);

            $query = "SELECT id, estado FROM peliculas WHERE estado = '$nestado' AND id = '".$_POST['popup_desactivar_pelicula_ide']."'";
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
