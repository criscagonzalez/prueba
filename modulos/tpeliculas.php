<?php
    require("config.php");

    $query = "SELECT 
    peliculas.id, peliculas.estado, peliculas.nombres, peliculas.fecha_creacion, peliculas.fecha_modificacion,
    usuariosr.usuario as usuariosr, usuariosm.usuario as usuariosm
    FROM peliculas 
    left outer join usuarios AS usuariosr
    on peliculas.usuario_crea = usuariosr.id
    left outer join usuarios AS  usuariosm
    on peliculas.usuario_modifica = usuariosm.id
    ORDER BY peliculas.nombres ASC";
    $result = mysqli_query($connection,$query);
?>
<table class="table table-striped table-sm">
    <thead>
    <tr>
        <th scope="col">Opciones</th>
        <th scope="col">Estado</th>
        <th scope="col">Id</th>
        <th scope="col">Nombre De Pelicula</th>
        <th scope="col">Usuario que registra</th>
        <th scope="col">Fecha Registro</th>
        <th scope="col">Usuario que modifica</th>
        <th scope="col">Fecha Modificación</th>
    </tr>
    </thead>
    <tbody>
    <?php
        while($resulta = mysqli_fetch_array($result))
        {
        ?>
        <tr>
            <th scope = "row">
            <i class="bi bi-pencil-square" title="Editar" style = "font-size: 17px; color: #009ED9;"  onclick = "Peliculas('Modificar-Consultar', '<?php echo $resulta['id'];?>', PopupnPELInomb);"></i>
            <?php 
                if($resulta['estado'] == "N" || $resulta['estado'] == "" )
                {
                ?>
                <i class="bi bi-person-check-fill" title="Activar" style = "font-size: 17px; color: green;" onclick = "Peliculas('Activar/Desactivar', '<?php echo $resulta['id'];?>');"></i>
                <?php
                }
                if($resulta['estado'] == "S")
                {
                ?>
                <i class="bi bi-person-x-fill" title="Desactivar" style = "font-size: 17px; color: red;"onclick = "Peliculas('Activar/Desactivar', '<?php echo $resulta['id'];?>');"></i>
                <?php
                }
            ?>
            </td>
            <td>
            <?php 
            if($resulta['estado'] == "S")
            {
            ?>
                <i class="bi bi-check-circle-fill" style = "font-size: 17px; color: green"></i>
            <?php
            }
            if($resulta['estado'] == "N" || $resulta['estado'] == "" )
            {
            ?>
                <i class="bi bi-x-circle-fill" style = "font-size: 17px; color: red"></i>
            <?php
            }
            ?>
            </td>
            <td><?php echo $resulta['id'];?></td>
            <td><?php echo $resulta['nombres'];?></td>
            <td><?php echo $resulta['usuariosr'];?></td>
            <td><?php echo $resulta['fecha_creacion'];?></td>
            <td><?php echo $resulta['usuariosm'];?></td>
            <td><?php echo $resulta['fecha_modificacion'];?></td>
        </tr>
        <?php
        }
    ?>            
    </tbody>
</table>