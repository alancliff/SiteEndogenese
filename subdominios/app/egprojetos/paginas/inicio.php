<?php
session_start();
                        // setcookie(session_name(),session_id(),time()+$lifetime);
session_regenerate_id(true); 
$_SESSION['id_empresa'] = 1;



echo "Estou aqui.";

?>