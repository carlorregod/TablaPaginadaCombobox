var capsula = function () {
    //Función ajax callback-pv2
    ajaxCallback = function(params, method, url, callback, asynchr)
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

    //Callback tabla pv2
    fn_callback_Tabla = function(data) {
        var respJson = JSON.parse(data);
        document.getElementById('tabla_agenda').innerHTML = respJson.lista;
        document.getElementById('pag_actual').innerHTML = respJson.paginas_actual;
    };

    //Callback combobox pv2
    fn_callback_PaginaCombo = function(data) {
        var respJson = JSON.parse(data);
        document.getElementById('pagina_combobox').innerHTML = respJson.lista;
        document.getElementById('total_pag').innerHTML = respJson.paginas_totales;
    };

    //Callback paginación de combobox pv2
    fn_callback_PaginaCombo = function(data) {
        var respJson = JSON.parse(data);
        document.getElementById('pagina_combobox').innerHTML = respJson.lista;
        document.getElementById('total_pag').innerHTML = respJson.paginas_totales;
    };

    //Método inicial al cargar la página pv2
    _inicio = function() {
        //Carga de tabla
        document.getElementById('alternativas_pagina').value=4;
        _cant_registros();
    };

    //Método inicial al cargar la página publico
    this.inicio = function() {
        return _inicio();
    };

    //Método de carga de registros pv2
    _cant_registros = function() {
        //Re-reCarga de tabla
        var num_pagina = document.getElementById('alternativas_pagina').value;
        parametros = '&comando=cargaInicial'+
                        '&pagina=1'         +
                        '&num_pagina='      + num_pagina;
        method= "POST";
        url='php/modelador.php';
        ajaxCallback(parametros, method, url, fn_callback_Tabla);
        //Cargar combobox-páginas
        parametros = '&comando=cargaPaginaCbox' +
                     '&num_pagina='      + num_pagina;
        ajaxCallback(parametros, method, url, fn_callback_PaginaCombo);
           
    };

    //Método de carga de registros pública
    this.cant_registros = function() {
        return _cant_registros();
    };

    //Función que cambia el combobox pv2
    _cambio_combobox = function() {
        //Re-carga de tabla
        var pagina = document.getElementById('pagina_combobox').value;
        var num_pagina = document.getElementById('alternativas_pagina').value;
        parametros = '&comando=cargaInicial'+
                        '&pagina='          +pagina +
                        '&num_pagina='      +num_pagina;
        method= "POST";
        url='php/modelador.php';
        ajaxCallback(parametros, method, url, fn_callback_Tabla);
    };
    //Función que cambia el combobox público
    this.cambio_combobox = function() {
        return _cambio_combobox();
    };


};


var caps = new capsula;

window.onload = caps.inicio;

document.getElementById('pagina_combobox').onchange = caps.cambio_combobox;

document.getElementById('alternativas_pagina').onchange = caps.cant_registros;