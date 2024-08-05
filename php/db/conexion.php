<?php
        $server = "localhost";
        $usuario = "root";
        $clave = "";
        $basededatos = "productos";
        $link = mysqli_connect($server,$usuario,$clave);
        $db= mysqli_select_db($link,$basededatos);
?>