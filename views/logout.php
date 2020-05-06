
<?php

require_once(dirname(dirname(__FILE__)) . '/controllers/login_controller.php');

$estudiante_controller = new login_controller();

$estudiante_controller->logout();

?>

