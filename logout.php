<?php
session_start();
session_destroy();
header("Location: colaboradores.html");
/*Para redirir a colaboradores apenas cierre sesion*/
exit;
?>
