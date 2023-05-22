//---------------------------------------------------------
//------------- Variables Globales -------------------
//---------------------------------------------------------

    //------------- PopUps -------------------

        //------------- Consultar y Registrar -------------------
            //------------- Usuarios -------------------
            //Datos del usuario
            PopupnUSUtitu = document.getElementById("Usuario-Titulo");
            PopupnUSUide = document.getElementById("Usuario-Id");
            PopupnUSUnomb = document.getElementById("nusuario");
            PopupnUSUpass = document.getElementById("npassword");
            PopupnUSUbtng = document.getElementById("Usuario-btn-guardar");
            PopupnUSUtpass = document.getElementById("Usuario-Clave");
            PopupnUSUtusu = document.getElementById("ntipo");

//---------------------------------------------------------
//------------- Usuarios -------------------
//---------------------------------------------------------

    //---------------------------------------------------------
    //------------- PopUps -------------------
    //---------------------------------------------------------
    function Usuarios(opcion_usuario, valor1, valor2, valor3)
    {
        switch (opcion_usuario)
        {
            case "Crear":
                if
                (
                    (valor1 != '') &&
                    (valor2 != '')
                )
                {
                    Aviso("GUARDANDO");
                    jQuery.ajax
                    ({
                        url: 'modulos/get-usuarios.php',
                        type: 'POST',
                        data: {
                                popup_crear_usuario_nomb:  valor1,
                                popup_crear_usuario_pass:  valor2,
                                popup_crear_usuario_tipo:  valor3
                        },
                        success: function (response)
                        {
                            try
                            {
                                this.resultado = JSON.parse(response);
                                this.resultado.USUARIO;
                                Aviso("USUARIO CREADO");
                                recargar("tusuarios", "modulos/tusuarios.php");
                            }
                            catch
                            {
                                Aviso("ERROR AL GUARDAR", response);
                            }
                        }
                    });
                }
                else
                {
                    Aviso("ERROR AL GUARDAR", "debe diligenciar todos los datos");
                }
            break;
            case "Registrar":
                PopupnUSUtitu.innerHTML = "Registrar Nuevo Usuario";
                PopupnUSUtpass.innerHTML = "(*) Contraseña";
                PopupnUSUbtng.innerHTML= "Crear";
                PopupnUSUide.innerHTML = "";
                PopupnUSUnomb.value = "";
                PopupnUSUpass.value = "";
            break;
            case "Modificar-Consultar":
                Aviso("CONSULTANDO");
                try
                {
                    $("#popupmensaje").modal("show");
                    PopupnUSUide.innerHTML = valor1;
                    PopupnUSUtitu.innerHTML = "Modificar Usuario &nbsp;";
                    PopupnUSUtpass.innerHTML = "(*) Nueva contraseña";
                    PopupnUSUbtng.innerHTML = "Guardar";
                    
                    jQuery.ajax
                    ({
                        url: 'modulos/get-usuarios.php',
                        type: 'POST',
                        data: {
                                popup_usuario_ide:  PopupnUSUide.innerHTML
                        },
                        success: function (response)
                        {
                            this.resultado = JSON.parse(response);
                            PopupnUSUnomb.value = this.resultado.usuario;
                            PopupnUSUtusu.value = this.resultado.tipo;
                            $("#popupmensaje").modal("hide");
                            PopupnUSUbtng.innerHTML = "Actualizar"
                            $("#Usuario").modal("show");
                            PopupnUSUbtng.setAttribute("onclick","Usuarios('Modificar')");

                        }
                    });
                }
                catch
                {
                    Aviso("ERROR AL CARGAR", 'no se logro conectar a la base de datos');
                    $("#Usuario").modal("hide");
                }
                
            break;
            case "Modificar":
                jQuery.ajax
                ({
                    url: 'modulos/get-usuarios.php',
                    type: 'POST',
                    data: {
                            popup_modifica_usuario_ide:  PopupnUSUide.innerHTML,
                            popup_modifica_usuario_nomb:  PopupnUSUnomb.value,
                            popup_modifica_usuario_pass:  PopupnUSUpass.value
                    },
                    success: function (response)
                    {
                        try
                        {
                            this.resultado = JSON.parse(response);
                            this.resultado.ID;
                            Aviso("CAMBIOS GUARDADOS");
                            recargar("tusuarios", "modulos/tusuarios.php");
                        }
                        catch
                        {
                            Aviso("CAMBIOS NO GUARDADOS");
                        }
                    }
                });
            break;
            case "Activar/Desactivar":
            jQuery.ajax
            ({
                url: 'modulos/get-usuarios.php',
                type: 'POST',
                data: {
                        popup_desactivar_usuario_ide:  valor1
                },
                success: function (response)
                {
                    try
                    {
                        this.resultado = JSON.parse(response);
                        this.resultado.ID;
                        Aviso("CAMBIOS GUARDADOS");
                        recargar("tusuarios", "modulos/tusuarios.php");
                    }
                    catch
                    {
                        Aviso("CAMBIOS NO GUARDADOS");
                    }
                }
            });
            break;
        }
    }