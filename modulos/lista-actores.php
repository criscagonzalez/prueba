<?php 
    require("config.php");

    $query = "SELECT 
    preguntas.id, preguntas.descripcion
    FROM preguntas
    WHERE preguntas.estado = 'S'
    ORDER BY preguntas.id ASC";
    $result = mysqli_query($connection,$query);


    while($resulta = mysqli_fetch_array($result))
    {
?>
    <option value="<?php echo $resulta['id']; ?>"><?php echo $resulta['id'].' - '.$resulta['descripcion']; ?></option>
<?php
    }
?>