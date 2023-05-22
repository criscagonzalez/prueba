<?php
session_start();
date_default_timezone_set('America/Bogota');  
require_once('config.php');

    //-------------------------------------------------
    //------------ VALIDAR USUARIO ------------------
    //-------------------------------------------------

        //-------------------------------------------------
        //------------ CONSULTAR TIPO USUARIO ------------------
        //-------------------------------------------------
        if 
        (    
            isset($_SESSION['usuario']) &&
            isset($_SESSION['clave'])
        )
        {
            mb_internal_encoding("UTF-8");

            $connection = mysqli_connect($ip,$user,$passwd,$database);

            $query = "SELECT * FROM usuarios WHERE usuario = '".$_SESSION['usuario']."' AND password = '".$_SESSION['clave']."'";
            $result = mysqli_query($connection,$query);
            $result = mysqli_fetch_array($result);
            echo $result['TIPO'] ;
            if($result['tipo'] != '')
            {
                switch($result['tipo'])
                {
                    case 'admin':
                        header( 'Location: ../root-index.php' ) ;
                        exit();
                    break;
                    case 'user':
                        header( 'Location: ../user-inicio.php' ) ;
                        exit();
                    break;
                }
            }
        }
        else
        {
            header( 'Location: ../index.php' ) ;
            exit();
        }