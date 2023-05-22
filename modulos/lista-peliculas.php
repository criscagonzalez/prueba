<?php 
    require("config.php");

    $query = "SELECT 
    peliculas.id, peliculas.nombres
    FROM peliculas
    WHERE peliculas.estado = 'S'
    ORDER BY peliculas.id ASC";
    $result = mysqli_query($connection,$query);


    while($resulta = mysqli_fetch_array($result))
    {
?>
    <option value="<?php echo $resulta['id']; ?>"><?php echo $resulta['nombres']; ?></option>
<?php
    }
?>