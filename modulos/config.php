<?php
    date_default_timezone_set('America/Bogota');

    $user = 'ginp';
    $passwd = '7c4a8d09ca3762af61e59520943dc26494f8941b';
    $ip = 'localhost';
    $database = 'GINP';

    $connection = mysqli_connect($ip, $user, $passwd, $database);
    
?>