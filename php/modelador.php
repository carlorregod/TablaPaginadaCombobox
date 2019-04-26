<?php

require "conexion.php";

$cmd = $_POST['comando'];

switch($cmd)
{
    case "cargaInicial":
        $pgsql = getConnect();
        $sql = "SELECT * FROM Agenda";
        $consulta = pg_prepare($pgsql, "consulta_tabla",$sql) or die('Falló la query1: '. pg_last_error());;
        $consulta = pg_execute($pgsql, "consulta_tabla",array()) or die('Falló la query2: ' . pg_last_error());;
        $lista = "";
        while($f = pg_fetch_object($consulta))
        {
            $lista .='<tr><th scope="row">'
                        .$f->id_agenda.
                        '</th><td>'
                        .$f->nombre.
                        '</td><td>'
                        .$f->direccion.
                        '</td><td>'
                        .$f->telefono.
                        '</td></tr>';            
        }
        pg_close($pgsql);
        echo $lista;
        break;

    default:
        break;

}