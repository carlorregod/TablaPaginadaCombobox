<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Tablas paginadas</title>
</head>
<body>

    <div class="badge badge-pill badge-success pl-3 py-3 my-3 mx-3">
    <h1>Tabla para paginar</h1>
    </div>

    <table class="table table-hover table-responsive mt-3 ml-3">
    <thead>
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Dirección</th>
        <th scope="col">Teléfono</th>
        </tr>
    </thead>
    <tbody id="tabla_agenda">
        <!-- Los registros de tabla... -->
    </tbody>
    </table>

    <table>
        <tr>
            <td><p class="mr-2 mb-1">Página <span id="pag_actual"></span> de <span id="total_pag"></span></p></td>
            <td>
                <select class="custom-select custom-select-sm" id="pagina_combobox">
                    <!-- Las páginas... -->
                </select>
            </td>
            <td><p class="mr-2 ml-2 mb-1">Mostrar filas: </p></td>
            <td>
                <select class="custom-select custom-select-sm" id="alternativas_pagina">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </td>
        </tr>
    </table>

</body>
<footer>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"
    integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
    crossorigin="anonymous"></script>
    <!--script src="js/index.js"></script-->
    <script src="js/index-JQ.js"></script>
</footer>
</html>