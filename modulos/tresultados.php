<?php
    session_start();
    date_default_timezone_set('America/Bogota');  
    require_once('config.php');

    mb_internal_encoding("UTF-8");

    //-------------------------------------------------
    //---- VALIDAR SI INICIO SESION USUARIO ----------
    //-------------------------------------------------
    if
    (
        isset($_SESSION['usuario']) != ''
    )
    {
        switch($_POST['popup_actor_tip'])
        {
            case "Actor":
                //-------------------------------------------------
                //------------ CONSULTAR ELENCO POR ACTOR --------
                //-------------------------------------------------
                if 
                (    
                    isset($_POST['popup_actor_ide'])
                )
                {
                    ?>
                    <div class="row align-items-center" id = "Resultados-Titulo">
                        <hr>  
                        <div class="col-lg-11 col-mb-11 col-sm-11">
                            <h1 class="modal-title fs-5" id="Actor-Titulo">Peliculas en las que aparece</h1>
                            <br>
                        </div>
                        <hr>
                    </div>
                    <?php

                    mb_internal_encoding("UTF-8");

                    $query = "SELECT 
                    elenco.id as idelenco, elenco.id_pelicula,
                    peliculas.id, peliculas.nombres as pelicula
                    FROM elenco 
                    LEFT JOIN peliculas
                    ON elenco.id_pelicula = peliculas.id
                    WHERE id_actor = '".$_POST['popup_actor_ide']."'
                    ORDER BY peliculas.nombres ASC";
                    $query = mysqli_query($connection,$query);

                while ($result = mysqli_fetch_array($query))
                {
                ?>
                    <div class="row align-items-center" id = "tresultados">
                        <div class="col-lg-11 col-mb-11 col-sm-11">
                            <label for="nactor" class="form-label"><?php echo $result['pelicula'];?></label>
                        </div>
                        <div class="col-lg-1 col-mb-1 col-sm-1">
                            <i class="bi bi-x-circle-fill" title="Eliminar" style = "font-size: 17px; color: red;"onclick = "Elenco('Actor','Borrar', '<?php echo $result['idelenco'];?>');"></i>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="row align-items-center" id = "tagregar">
                    <div class="col-lg-3 col-mb-3 col-sm-3">
                        <label for="nactor" class="form-label">Agregar pelicula</label>
                    </div>
                    <div class="col-lg-8 col-mb-8 col-sm-8">
                        <select class="form-select" aria-label="Default select example" id="nlista">
                            <?php 
                                require("config.php");

                                $query = "SELECT *
                                FROM peliculas
                                WHERE
                                peliculas.id NOT IN
                                (
                                    SELECT 
                                    elenco.id_pelicula
                                    FROM elenco  
                                    WHERE 
                                    elenco.id_pelicula = peliculas.id AND 
                                    elenco.id_actor = '".$_POST['popup_actor_ide']."'
                                )
                                    ORDER BY peliculas.nombres ASC";
                                
                                $result = mysqli_query($connection,$query);


                                while($resulta = mysqli_fetch_array($result))
                                {
                            ?>
                                <option value="<?php echo $resulta['id']; ?>"><?php echo $resulta['nombres']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-1 col-mb-1 col-sm-1">
                        <i class="bi bi-plus-circle-fill" title="Agregar" style = "font-size: 17px; color: green;"onclick = "Elenco('Actor','Agregar')"></i>
                    </div>
                </div>
            <?php
                }
            break;
            case "Pelicula":
                //-------------------------------------------------
                //------------ CONSULTAR ELENCO POR PELICULA --------
                //-------------------------------------------------
                if 
                (    
                    isset($_POST['popup_actor_ide'])
                )
                {
                    ?>
                    <div class="row align-items-center" id = "Resultados-Titulo">
                        <hr>  
                        <div class="col-lg-11 col-mb-11 col-sm-11">
                            <h1 class="modal-title fs-5" id="Actor-Titulo">Actores que aparecen</h1>
                            <br>
                        </div>
                        <hr>
                    </div>
                    <?php

                    mb_internal_encoding("UTF-8");

                    $query = "SELECT 
                    elenco.id as idelenco, elenco.id_actor, 
                    actores.id, actores.nombres as actor 
                    FROM elenco 
                    LEFT JOIN actores
                    ON elenco.id_actor = actores.id
                    WHERE id_pelicula = '".$_POST['popup_actor_ide']."'
                    ORDER BY actores.nombres";
                    $query = mysqli_query($connection,$query);

                while ($result = mysqli_fetch_array($query))
                {
                ?>
                    <div class="row align-items-center" id = "tresultados">
                        <div class="col-lg-11 col-mb-11 col-sm-11">
                            <label for="nactor" class="form-label"><?php echo $result['actor'];?></label>
                        </div>
                        <div class="col-lg-1 col-mb-1 col-sm-1">
                            <i class="bi bi-x-circle-fill" title="Eliminar" style = "font-size: 17px; color: red;"onclick = "Elenco('Pelicula','Borrar', '<?php echo $result['idelenco'];?>');"></i>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="row align-items-center" id = "tagregar">
                    <div class="col-lg-3 col-mb-3 col-sm-3">
                        <label for="nactor" class="form-label">Agregar actor</label>
                    </div>
                    <div class="col-lg-8 col-mb-8 col-sm-8">
                        <select class="form-select" aria-label="Default select example" id="nlista">
                            <?php 
                                require("config.php");

                                $query = "SELECT *
                                FROM actores
                                WHERE
                                actores.id NOT IN
                                (
                                    SELECT 
                                    elenco.id_actor
                                    FROM elenco  
                                    WHERE 
                                    elenco.id_actor = actores.id AND 
                                    elenco.id_pelicula = '".$_POST['popup_actor_ide']."'
                                )
                                    ORDER BY actores.nombres ASC";
                                
                                $result = mysqli_query($connection,$query);


                                while($resulta = mysqli_fetch_array($result))
                                {
                            ?>
                                <option value="<?php echo $resulta['id']; ?>"><?php echo $resulta['nombres']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-1 col-mb-1 col-sm-1">
                        <i class="bi bi-plus-circle-fill" title="Agregar" style = "font-size: 17px; color: green;"onclick = "Elenco('Pelicula','Agregar')"></i>
                    </div>
                </div>
            <?php
                }
            break;
        }
    }
    ?>