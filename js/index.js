
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
    return false;
};

inicio = function() {
    parametros = '&comando=cargaInicial';
    method= "POST";
    url='php/modelador.php';
    ajaxCallback(parametros, method, url, fn_callback_Tabla);
};

window.onload = inicio;