<?php

require "conexion.php";

$cmd = $_POST['comando'];

$paginas_totales;

switch($cmd)
{
    case "cargaInicial":
        $pgsql = getConnect();
        $sql = "SELECT * FROM Agenda LIMIT 4 OFFSET 0";
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

    case "cargaPaginaCbox":
        $registro_x_pagina = 4;
        $pgsql = getConnect();
        $sql = "SELECT * FROM Agenda";
        $consulta = pg_prepare($pgsql, "consulta_tabla",$sql) or die('Falló la query1: '. pg_last_error());;
        $consulta = pg_execute($pgsql, "consulta_tabla",array()) or die('Falló la query2: ' . pg_last_error());;
        $cuentafilas = pg_num_rows($consulta); //n° de filas dinámico
        pg_close($pgsql);
        $paginas_totales = ceil($cuentafilas/$registro_x_pagina); //14/4=3 y sobran 2, mostrará 4 en este ejemplo por el ceil
        $lista = "";
        for($i=1;$i<=$paginas_totales;$i++)
        {
            $lista .='<option value="'
                        .$i.
                        '">'
                        .$i.
                        '</option>';
        }
        $arreglo =['lista' => $lista ,'paginas_totales' => $paginas_totales];
        echo json_encode($arreglo, JSON_FORCE_OBJECT);
        break;
        
    default:
        break;

}