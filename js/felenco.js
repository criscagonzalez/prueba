//---------------------------------------------------------
//------------- Variables Globales -------------------
//---------------------------------------------------------

    //------------- PopUps -------------------

        //------------- Consultar y Registrar -------------------
            //------------- Elenco -------------------
            //Datos del elenco
            PopupnELEidp = document.getElementById("nlista");
            Popupntres = document.getElementById("resultados");

//---------------------------------------------------------
//------------- Elenco -------------------
//---------------------------------------------------------

    //---------------------------------------------------------
    //------------- PopUps -------------------
    //---------------------------------------------------------
    function Elenco(tipo, opcion_elenco, valor)
    {
        switch (tipo)
        {
            case "Actor":
                valor1 = document.getElementById("Actor-Id").innerHTML;
                valor2 = document.getElementById("nlista").value;
                id = valor1;
            break;
            case "Pelicula":
                valor2 = document.getElementById("Pelicula-Id").innerHTML;
                valor1 = document.getElementById("nlista").value;
                id = valor2
            break;
        }

        switch (opcion_elenco)
        {
            case "Agregar":
                if
                (
                    valor1 != '' &&
                    valor2 != ''
                )
                {
                    Aviso("GUARDANDO");
                    jQuery.ajax
                    ({
                        url: 'modulos/get-elenco.php',
                        type: 'POST',
                        data: {
                                popup_agregar_elenco_actor:       valor1,
                                popup_agregar_elenco_pelicula:    valor2
                        },
                        success: function (response)
                        {
                            try
                            {
                                this.resultado = JSON.parse(response);
                                //this.resultado.ID;
                                Aviso("CAMBIOS GUARDADOS");
                                jQuery.ajax
                                ({
                                    url: 'modulos/tresultados.php',
                                    type: 'POST',
                                    data: {
                                            popup_actor_ide:  id,
                                            popup_actor_tip:  tipo
                                    },
                                    success: function (response)
                                    {
                                        Popupntres.innerHTML = response ;
                                    }
                                });
                            }
                            catch
                            {
                                //Aviso("ERROR AL GUARDAR", response);
                            }
                        }
                    });
                }
                else
                {
                    Aviso("ERROR AL GUARDAR", "debe diligenciar todos los datos");
                }
            break;
            case "Borrar":
            jQuery.ajax
            ({
                url: 'modulos/get-elenco.php',
                type: 'POST',
                data: {
                        popup_borrar_elenco_ide:  valor
                },
                success: function (response)
                {
                    try
                    {
                        //this.resultado = JSON.parse(response);
                        //this.resultado == null;
                        Aviso("CAMBIOS GUARDADOS");
                        jQuery.ajax
                        ({
                            url: 'modulos/tresultados.php',
                            type: 'POST',
                            data: {
                                    popup_actor_ide:  id,
                                    popup_actor_tip:  tipo
                            },
                            success: function (response)
                            {
                                Popupntres.innerHTML = response ;
                            }
                        });
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