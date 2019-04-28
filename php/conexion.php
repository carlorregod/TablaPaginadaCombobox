<?php
class conexion
{
    private static function _getConnect()
    {
        //Declarando parámetros
        $host="localhost";
        $dbname="TablaPagina";
        $port="5432";
        $user="carlos";
        $password="2004330";
            
        //Proceso de conexión
        $cadenaConexion="host=$host dbname=$dbname port=$port user=$user password=$password";
        $dbconexion = pg_connect($cadenaConexion) or die('No se ha podido conectar: ' .pg_last_error());
        
        //Verificando la conexion
        if(!$dbconexion){ echo "<p>No se pudo conectar con el servidor</p>"; }
        //pg_set_client_encoding($conn, "UNICODE"); //Coloque LATIN1 sólo en casos de otra fuente de Encoding
        //Retorno de la conexión
        //echo '<p>Me conectó</p>'; Comando para probar si se conectó o no...
        return $dbconexion;
    }

    public static function getConnect()
    {
        return self::_getConnect();
    }
}

