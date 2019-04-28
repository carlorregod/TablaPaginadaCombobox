<?php

require "conexion.php";

class capsula
{
    public function __construct($cmd, $pagina, $registro_x_pagina)
    {
        $this->cmd = $cmd;
        $this->pagina = $pagina;
        $this->registro_x_pagina = $registro_x_pagina;
    }

    private function _comando()
    {
        switch($this->cmd)
        {
            case "cargaInicial":
                $offset = ($this->pagina-1)*$this->registro_x_pagina;
                $pgsql = conexion::getConnect();
                $sql = "SELECT * FROM Agenda LIMIT '$this->registro_x_pagina' OFFSET '$offset'";
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
                $arreglo =['lista' => $lista ,'paginas_actual' => $this->pagina];
                return json_encode($arreglo, JSON_FORCE_OBJECT);
                //break;

            case "cargaPaginaCbox":
                $pgsql = conexion::getConnect();
                $sql = "SELECT * FROM Agenda";
                $consulta = pg_prepare($pgsql, "consulta_tabla",$sql) or die('Falló la query1: '. pg_last_error());;
                $consulta = pg_execute($pgsql, "consulta_tabla",array()) or die('Falló la query2: ' . pg_last_error());;
                $cuentafilas = pg_num_rows($consulta); //n° de filas dinámico
                pg_close($pgsql);
                $paginas_totales = ceil($cuentafilas/$this->registro_x_pagina); //14/4=3 y sobran 2, mostrará 4 en este ejemplo por el ceil
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
                return json_encode($arreglo, JSON_FORCE_OBJECT);
                //break;
                
            default:
                return;
                //break;

        }
    }

    public function comando()
    {
        return $this->_comando();
    }
}

$cmd = $_POST['comando'];
$pagina = $_POST['pagina'];
$registro_x_pagina = $_POST['num_pagina']; 

$caps = new capsula($cmd, $pagina, $registro_x_pagina);
echo $caps->comando();