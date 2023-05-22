//---------------------------------------------------------
//------------- Variables Globales -------------------
//---------------------------------------------------------

    //------------- PopUps -------------------

        //------------- Consultar y Registrar -------------------
            //------------- Peliculas -------------------
            //Datos del pelicula
            PopupnPELItitu = document.getElementById("Pelicula-Titulo");
            PopupnPELIide = document.getElementById("Pelicula-Id");
            PopupnPELInomb = document.getElementById("npelicula");
            PopupnPELIbtng = document.getElementById("Pelicula-btn-guardar");
            PopupnPELItusu = document.getElementById("ntipo");
            PopupnPELItres = document.getElementById("resultados");

//---------------------------------------------------------
//------------- Peliculas -------------------
//---------------------------------------------------------

    //---------------------------------------------------------
    //------------- PopUps -------------------
    //---------------------------------------------------------
    function Peliculas(opcion_pelicula, valor1)
    {
        id = valor1;
        switch (opcion_pelicula)
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
                        url: 'modulos/get-peliculas.php',
                        type: 'POST',
                        data: {
                                popup_crear_pelicula_nomb:  valor1
                        },
                        success: function (response)
                        {
                            try
                            {
                                this.resultado = JSON.parse(response);
                                this.resultado.nombres;
                                Aviso("CAMBIOS GUARDADOS");
                                recargar("tpeliculas", "modulos/tpeliculas.php");
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
                PopupnPELItitu.innerHTML = "Registrar Nueva Pelicula";
                PopupnPELIbtng.innerHTML= "Crear";
                PopupnPELIide.innerHTML = "";
                PopupnPELInomb.value = "";
                PopupnPELItres.innerHTML = "";
            break;
            case "Modificar-Consultar":
                Aviso("CONSULTANDO");
                try
                {
                    $("#popupmensaje").modal("show");
                    PopupnPELIide.innerHTML = valor1;
                    PopupnPELItitu.innerHTML = "Modificar Pelicula &nbsp;";
                    PopupnPELIbtng.innerHTML = "Guardar";
                    
                    jQuery.ajax
                    ({
                        url: 'modulos/get-peliculas.php',
                        type: 'POST',
                        data: {
                                popup_pelicula_ide:  PopupnPELIide.innerHTML,
                                popup_actor_tip:  "Pelicula"
                        },
                        success: function (response)
                        {
                            this.resultado = JSON.parse(response);
                            PopupnPELInomb.value = this.resultado.nombres;
                            $("#popupmensaje").modal("hide");
                            PopupnPELIbtng.innerHTML = "Actualizar"
                            $("#Pelicula").modal("show");
                            PopupnPELIbtng.setAttribute("onclick","Peliculas('Modificar')");

                        }
                    });
                    jQuery.ajax
                    ({
                        url: 'modulos/tresultados.php',
                        type: 'POST',
                        data: {
                                popup_actor_ide:  PopupnPELIide.innerHTML,
                                popup_actor_tip:  "Pelicula"
                        },
                        success: function (response)
                        {
                            PopupnPELItres.innerHTML = response ;
                        }
                    });
                }
                catch
                {
                    Aviso("ERROR AL CARGAR", 'no se logro conectar a la base de datos');
                    $("#Pelicula").modal("hide");
                }
                
            break;
            case "Modificar":
                jQuery.ajax
                ({
                    url: 'modulos/get-peliculas.php',
                    type: 'POST',
                    data: {
                            popup_modifica_pelicula_ide:  PopupnPELIide.innerHTML,
                            popup_modifica_pelicula_nomb:  PopupnPELInomb.value
                    },
                    success: function (response)
                    {
                        try
                        {
                            this.resultado = JSON.parse(response);
                            this.resultado.ID;
                            Aviso("CAMBIOS GUARDADOS");
                            recargar("tpeliculas", "modulos/tpeliculas.php");
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
                url: 'modulos/get-peliculas.php',
                type: 'POST',
                data: {
                        popup_desactivar_pelicula_ide:  valor1
                },
                success: function (response)
                {
                    try
                    {
                        this.resultado = JSON.parse(response);
                        this.resultado.ID;
                        Aviso("CAMBIOS GUARDADOS");
                        recargar("tpeliculas", "modulos/tpeliculas.php");
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