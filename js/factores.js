//---------------------------------------------------------
//------------- Variables Globales -------------------
//---------------------------------------------------------

    //------------- PopUps -------------------

        //------------- Consultar y Registrar -------------------
            //------------- Actores -------------------
            //Datos del actor
            PopupnACTtitu = document.getElementById("Actor-Titulo");
            PopupnACTide = document.getElementById("Actor-Id");
            PopupnACTnomb = document.getElementById("nactor");
            PopupnACTbtng = document.getElementById("Actor-btn-guardar");
            PopupnACTtusu = document.getElementById("ntipo");
            PopupnACTtres = document.getElementById("resultados");

//---------------------------------------------------------
//------------- Actores -------------------
//---------------------------------------------------------

    //---------------------------------------------------------
    //------------- PopUps -------------------
    //---------------------------------------------------------
    function Actores(opcion_actor, valor1)
    {
        switch (opcion_actor)
        {
            case "Crear":
                if
                (
                    valor1 != ''
                )
                {
                    Aviso("GUARDANDO");
                    jQuery.ajax
                    ({
                        url: 'modulos/get-actores.php',
                        type: 'POST',
                        data: {
                                popup_crear_actor_nomb:  valor1
                        },
                        success: function (response)
                        {
                            try
                            {
                                this.resultado = JSON.parse(response);
                                this.resultado.nombres;
                                Aviso("CAMBIOS GUARDADOS");
                                recargar("tactores", "modulos/tactores.php");
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
                PopupnACTtitu.innerHTML = "Registrar Nuevo Actor";
                PopupnACTbtng.innerHTML= "Crear";
                PopupnACTide.innerHTML = "";
                PopupnACTnomb.value = "";
                PopupnACTtres.innerHTML = "";
            break;
            case "Modificar-Consultar":
                Aviso("CONSULTANDO");
                try
                {
                    $("#popupmensaje").modal("show");
                    PopupnACTide.innerHTML = valor1;
                    PopupnACTtitu.innerHTML = "Modificar Actor &nbsp;";
                    PopupnACTbtng.innerHTML = "Guardar";
                    
                    jQuery.ajax
                    ({
                        url: 'modulos/get-actores.php',
                        type: 'POST',
                        data: {
                                popup_actor_ide:  PopupnACTide.innerHTML,
                                popup_actor_tip:  "Actor"
                        },
                        success: function (response)
                        {
                            this.resultado = JSON.parse(response);
                            PopupnACTnomb.value = this.resultado.nombres;
                            $("#popupmensaje").modal("hide");
                            PopupnACTbtng.innerHTML = "Actualizar"
                            $("#Actor").modal("show");
                            PopupnACTbtng.setAttribute("onclick","Actores('Modificar')");

                        }
                    });
                    jQuery.ajax
                    ({
                        url: 'modulos/tresultados.php',
                        type: 'POST',
                        data: {
                                popup_actor_ide:  PopupnACTide.innerHTML,
                                popup_actor_tip:  "Actor"
                        },
                        success: function (response)
                        {
                            PopupnACTtres.innerHTML = response ;
                        }
                    });
                }
                catch
                {
                    Aviso("ERROR AL CARGAR", 'no se logro conectar a la base de datos');
                    $("#Actor").modal("hide");
                }
                
            break;
            case "Modificar":
                jQuery.ajax
                ({
                    url: 'modulos/get-actores.php',
                    type: 'POST',
                    data: {
                            popup_modifica_actor_ide:  PopupnACTide.innerHTML,
                            popup_modifica_actor_nomb:  PopupnACTnomb.value
                    },
                    success: function (response)
                    {
                        try
                        {
                            this.resultado = JSON.parse(response);
                            this.resultado.ID;
                            Aviso("CAMBIOS GUARDADOS");
                            recargar("tactores", "modulos/tactores.php");
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
                url: 'modulos/get-actores.php',
                type: 'POST',
                data: {
                        popup_desactivar_actor_ide:  valor1
                },
                success: function (response)
                {
                    try
                    {
                        this.resultado = JSON.parse(response);
                        this.resultado.ID;
                        Aviso("CAMBIOS GUARDADOS");
                        recargar("tactores", "modulos/tactores.php");
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