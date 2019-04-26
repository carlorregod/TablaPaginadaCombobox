
ajaxCallback = function(params, method, url, callback, asynchr=true )
    {
        var xhttp = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
        xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) 
                {
                        var resp = xhttp.responseText;
                        //var respJson = JSON.parse(resp);
                        callback(resp);
                }
                else
                {
                        //console.log("xhr ha fallado...");
                }
        };
        xhttp.open(method, url, asynchr);    // Tipo de comunicacion
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(params);  // envio de http
        console.log("Enviando peticion al servidor...");
        return false;
    };


fn_callback_Tabla = function(data) {
    document.getElementById('tabla_agenda').innerHTML = data;
};

fn_callback_PaginaCombo = function(data) {
    var respJson = JSON.parse(data);
    document.getElementById('pagina_combobox').innerHTML = respJson.lista;
    document.getElementById('total_pag').innerHTML = respJson.paginas_totales;
};

inicio = function() {
    //Carga de tabla
    parametros = '&comando=cargaInicial';
    method= "POST";
    url='php/modelador.php';
    ajaxCallback(parametros, method, url, fn_callback_Tabla);
    //Cargar combobox-páginas
    parametros = '&comando=cargaPaginaCbox';
    method= "POST";
    url='php/modelador.php';
    ajaxCallback(parametros, method, url, fn_callback_PaginaCombo);
    
};

window.onload = inicio;