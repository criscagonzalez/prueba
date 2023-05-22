<?php
    session_start();
    date_default_timezone_set('America/Bogota');  
    require_once('../modulos/config.php');

    mb_internal_encoding("UTF-8");
    //-------------------------------------------------
    //---- VALIDAR SESION SI USUARIO ES NO VALIDO ------
    //-------------------------------------------------
    if 
    (    
        isset($_POST['usuario_nomb']) &&
        isset($_POST['usuario_pass'])
    )
    {    
        $query = "SELECT id, usuario, password, tipo FROM usuarios WHERE usuario = '".$_POST['usuario_nomb']."' AND password = '".sha1($_POST['usuario_pass'])."' AND estado = 'S'";
        $query = mysqli_query($connection,$query);
        $query = mysqli_fetch_array($query);

        if( isset($query['usuario']) )
        {
            $_SESSION['id'] = $query['id'];
            $_SESSION['usuario'] = $query['usuario'];
            $_SESSION['clave'] = $query['password'];
            $_SESSION['tipo'] = $query['tipo'];
            echo json_encode($query);
        }
        else
        {
            echo "error";
            session_destroy();
        }    
    }

    //-------------------------------------------------
    //---- VALIDAR SI INICIO SESION USUARIO ----------
    //-------------------------------------------------
    if
    (
        isset($_SESSION['usuario']) != '' &&
        isset($_SESSION['clave']) != '' &&
        isset($_SESSION['tipo']) != ''
    )
    {
        //echo "sesion iniciada";
        
        //-------------------------------------------------
        //------------ REGISTRAR NUEVO USUARIO ------------------
        //-------------------------------------------------
        if 
        (    
            isset($_POST['popup_crear_usuario_nomb']) &&
            isset($_POST['popup_crear_usuario_pass']) &&
            isset($_POST['popup_crear_usuario_tipo'])
        )
        {
            //echo "crear";

            $query = "INSERT INTO `usuarios` (`id`, `estado`, `usuario`, `password`, `tipo`, `fecha_creacion`) VALUES (NULL, 'S', '".$_POST['popup_crear_usuario_nomb']."','".sha1($_POST['popup_crear_usuario_pass'])."', '".$_POST['popup_crear_usuario_tipo']."', TIMESTAMP('".date('Y-m-d')."', '".date('H:i:s')."'))";
            $result = mysqli_query($connection,$query);

            $query = "SELECT id, usuario, password FROM usuarios WHERE usuario = '".$_POST['popup_crear_usuario_nomb']."' AND password = '".sha1($_POST['popup_crear_usuario_pass'])."'";
            $query = mysqli_query($connection,$query);
            $query = mysqli_fetch_array($query);
    
            echo json_encode($query);
        }
        //-------------------------------------------------
        //------------ CONSULTAR USUARIO ------------------
        //-------------------------------------------------
        if 
        (    
            isset($_POST['popup_usuario_ide'])
        )
        {
        
            mb_internal_encoding("UTF-8");

            $query = "SELECT id, usuario FROM usuarios WHERE id = '".$_POST['popup_usuario_ide']."'";
            $query = mysqli_query($connection,$query);
            $query = mysqli_fetch_array($query);

            echo json_encode($query);
        }
        //-------------------------------------------------
        //------------ MODIFICA UN USUARIO ----------------
        //-------------------------------------------------
        if 
        (   
            isset($_POST['popup_modifica_usuario_ide']) && 
            isset($_POST['popup_modifica_usuario_nomb']) &&
            isset($_POST['popup_modifica_usuario_pass'])
        )
        {
            //echo "crear";

            $query = "UPDATE usuarios SET usuario = '".$_POST['popup_modifica_usuario_nomb']."', password = '".sha1($_POST['popup_modifica_usuario_pass'])."', fecha_modificacion = TIMESTAMP('".date('Y-m-d')."', '".date('H:i:s')."') WHERE id = ".$_POST['popup_modifica_usuario_ide'];
            $query = mysqli_query($connection,$query);

            $query = "SELECT id, usuario, password FROM usuarios WHERE usuario = '".$_POST['popup_modifica_usuario_nomb']."' AND password = '".sha1($_POST['popup_modifica_usuario_pass'])."' AND id = '".$_POST['popup_modifica_usuario_ide']."'";
            $query = mysqli_query($connection,$query);
            $query = mysqli_fetch_array($query);
    
            echo json_encode($query);
        }
        //-------------------------------------------------
        //----- DESACTIVAR / ACTIVAR UN USUARIO -----------
        //-------------------------------------------------
        if 
        (   
            isset($_POST['popup_desactivar_usuario_ide'])
        )
        {
            //echo "desactivar/activar";
            
            $query = "SELECT id, estado FROM usuarios WHERE id = '".$_POST['popup_desactivar_usuario_ide']."'";
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

            $query = "UPDATE usuarios SET estado = '$nestado', fecha_modificacion = TIMESTAMP('".date('Y-m-d')."', '".date('H:i:s')."') WHERE id = ".$_POST['popup_desactivar_usuario_ide'];
            $query = mysqli_query($connection,$query);

            $query = "SELECT id, estado FROM usuarios WHERE estado = '$nestado' AND id = '".$_POST['popup_desactivar_usuario_ide']."'";
            $query = mysqli_query($connection,$query);
            $query = mysqli_fetch_array($query);
    
            echo json_encode($query);
        }
    }
    else
    {
        //echo "no ha iniciado sesion";
    }
?>
