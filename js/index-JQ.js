var capsula = function () {
    //Función ajax callback-pv2
    ajaxCallback = function(params, method, url, callback, asynchr=true)
    {
        $.ajax({
            type: method,
            url: url,
            asynchr: asynchr,
            data: params
        })
        .done(function(respuesta) {
            callback(respuesta)
        })
        .fail(function(error){
            console.log('Ha fallado la operación'+error)
        });
    };

    //Callback tabla pv2
    fn_callback_Tabla = function(data) {
        var respJson = JSON.parse(data);
        $('#tabla_agenda').html(respJson.lista);
        $('#pag_actual').html(respJson.paginas_actual);
    };

    //Callback combobox pv2
    fn_callback_PaginaCombo = function(data) {
        var respJson = JSON.parse(data);
        $('#pagina_combobox').html(respJson.lista);
        $('#total_pag').html(respJson.paginas_totales);
    };

    //Método inicial al cargar la página pv2
    _inicio = function() {
        //Carga de tabla
        $('#alternativas_pagina').val(4);
        _cant_registros();
    };

    //Método inicial al cargar la página publico
    this.inicio = function() {
        return _inicio();
    };

    //Método de carga de registros pv2
    _cant_registros = function() {
        //Re-reCarga de tabla
        var num_pagina = $('#alternativas_pagina').val(); 
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
        

        var pagina      = $('#pagina_combobox').val();
        var num_pagina  = $('#alternativas_pagina').val();
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

$.ready=caps.inicio;

$('#pagina_combobox').on('change',caps.cambio_combobox);

$('#alternativas_pagina').change(caps.cant_registros);