<?php
    require("config.php");

    $query = "SELECT * FROM usuarios ORDER BY usuario ASC";
    $result = mysqli_query($connection,$query);
?>
<table class="table table-striped table-sm" id = "usuarios-maestro">
    <thead>
    <tr>
        <th scope="col">Opciones</th>
        <th scope="col">Estado</th>
        <th scope="col">Id</th>
        <th scope="col">Nombre De Usuario</th>
        <th scope="col">Tipo</th>
        <th scope="col">Fecha Registro</th>
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
            <i class="bi bi-pencil-square" title="Editar" style = "font-size: 17px; color: #009ED9;"  onclick = "Usuarios('Modificar-Consultar', '<?php echo $resulta['id'];?>');"></i>
            <?php 
                if($resulta['estado'] == "N" || $resulta['estado'] == "" )
                {
                ?>
                <i class="bi bi-person-check-fill" title="Activar" style = "font-size: 17px; color: green;" onclick = "Usuarios('Activar/Desactivar', '<?php echo $resulta['id'];?>');"></i>
                <?php
                }
                if($resulta['estado'] == "S")
                {
                ?>
                <i class="bi bi-person-x-fill" title="Desactivar" style = "font-size: 17px; color: red;"onclick = "Usuarios('Activar/Desactivar', '<?php echo $resulta['id'];?>');"></i>
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
            <td><?php echo $resulta['usuario'];?></td>
            <td><?php echo $resulta['tipo'];?></td>
            <td><?php echo $resulta['fecha_creacion'];?></td>
            <td><?php echo $resulta['fecha_modificacion'];?></td>
        </tr>
        <?php
        }
    ?>            
    </tbody>
</table>