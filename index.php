<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>INDEX</h1>
    <a href="ejemplo">EJEMPLO</a>
</body>
</html> -->

<?php

require_once('db/conexion.php');
require_once('controllers/login_controller.php');

$estudiante_controller = new login_controller();

$estudiante_controller->login();

?>