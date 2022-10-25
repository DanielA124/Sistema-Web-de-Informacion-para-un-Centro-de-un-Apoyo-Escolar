<div class="right_col" role="main">
    <!-- Inicio Div Right Col Role Main -->
    <div class="container md-3">
        <!-- Inicio Div container md-3 -->
        <div class="row">
            <!-- Inicio Div row -->
            <div class="col-md-12">
                <!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel">
                    <!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Datos del Cliente</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="row">
                <div class="col-md-2">
                <label>Nombre:</label>
                </div>
                <div class="col-md-2">
                <label>Ap. Paterno:</label>
                </div>
                <div class="col-md-2">
                <label>Ap. Materno:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                <input type="search" name="nombres" id="nombres" class="form-control"></input>
                </div>
                <div class="col-md-2">
                <input id="primerA" disabled class="form-control" placeholder="" value=""></input>
                </div>
                <div class="col-md-2">
                <input id="segundoA" disabled class="form-control" placeholder="" value=""></input>
                </div>
                <div class="col-md-3">
                    <button id="agregarTabla" disabled type="text" class="btn btn-success">
                        <i class="fa fa-plus-circle"></i> Agregar a la tabla
                    </button>
                </div>
            </div>
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
        <br>

        <div class="row">
            <!-- Inicio Div row -->
            <div class="col-md-12">
                <!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel">
                    <!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Datos del Pago</h2>
  
                        

                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->





        <form id="formulario12" class="formulario12" name="formulario12">

            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped " id="tablita">
                        <thead>
                            <tr class="headings" align="center">

                                <th class="column-title">Nombre </th>
                                <th class="column-title">Ap. Paterno </th>
                                <th class="column-title">Ap. Materno </th>
                                <th class="column-title">Monto </th>
                                <th class="column-title">Mes </th>
                                <th class="column-title">Año </th>
                                <th class="column-title no-link last"><span class="nobr">Eliminar</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody id="bodyTabla" align="center">


                        </tbody>
                    </table>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Total:</label>
                        <div class="col-sm-2">
                            <input type="number" disabled class="form-control" id="total" name="total" placeholder="0">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success" onclick="guardaryeditar(event)">
                        <i class="fa fa-plus-circle"></i>Insertar
                    </button>
                </div>


            </div>


    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->

</form>


<!-- Modal -->
<div class="modal fade" id="ModalPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Completado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Se registro correctamente el Pago, Volver a Inicio o Generar Factura.
            </div>
            <div class="modal-footer">
                <?php echo form_open_multipart('pago/index'); ?>
                <button type="submit" class="btn btn-secondary"><i class="fas fa-chevron-left"></i> Lista</button>               
                <?php echo form_close(); ?>

                <?php echo form_open_multipart('detalle/reportepdf'); ?>
                    <?php $pagoID=$this->db->query("SELECT MAX(idPago) AS Pago 
                                                    FROM pago");
                    $lastID = 1 ;
                        foreach ($pagoID->result() as $rowPago)
                        {
                        ?>
                            <input type="hidden" name="idPago" value="<?php echo $rowPago->Pago+$lastID;?>">
                            <button type="submit" class="btn btn-success"><i class="fas fa-file-pdf"></i> Factura</button>
                        <?php
                        }
                        ?>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>



<!-- ✅ Load CSS file for jQuery ui  -->
<link href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />

<!-- ✅ load jQuery ✅ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- ✅ load jQuery UI ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    let producto = [];
    let cliente = [];

    $("#nombres").autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: "<?= base_url() ?>index.php/detalle/estudianteList",
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    console.log(data);
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // Set selection
            $('#nombres').val(ui.item.value); // display the selected text
            $('#idInscripcion').val(ui.item.idInscripcion); // display the selected text
            $('#primerA').val(ui.item.apellidoPaterno); // display the selected text
            $('#segundoA').val(ui.item.apellidoMaterno); // display the selected text
            $('#mes').val(ui.item.mes); // display the selected text
            $('#anio').val(ui.item.anio); // save selected id to input
            $('button[id=agregarTabla]').removeAttr('disabled');
            nombres = ui.item;
            return false;
        }
    });

    console.log(producto);
    let count = 0;
    $(document).ready(function() {
        $("#agregarTabla").click(function() {
            // Para este ejemplo, en realidad no envíe el formulario
            event.preventDefault();
            markup = "<tr name='fila' id='fila" + count + "' class='even pointer'>" +"<td> "+nombres.value+"<input class='form-control' name='idInscripcion[]' type='hidden' value=" + nombres.idInscripcion + " ></td>" +"<td>"+nombres.apellidoPaterno+"</td>" +"<td>"+nombres.apellidoMaterno+"</td>" +
                "<td class='col-md-2'><input class='form-control' name='monto[]' type='double' value='300'></td>" +
                "<td><select class='form-select form-control' required name='mes[]' ><option>Enero</option><option>Febrero</option><option>Marzo</option><option>Abril</option><option>Mayo</option><option>Junio</option><option>Julio</option><option>Agosto</option><option>Septiembre</option><option>Octubre</option><option>Noviembre</option><option>Diciembre</option></select></td>" +
                "<td ><select class='form-select form-control' aria-label='Default select example' required name='anio[]'><option>2020</option><option>2021</option><option>2022</option><option>2023</option><option>2024</option><option>2025</option></select></td>" +
                "<td> <input type='button' class='form-control'  onclick='eliminarFila(" + count + ");' value='Eliminar' /></td>" +
                "</tr>";
            tableBody = $("#bodyTabla");
            tableBody.append(markup);
            count += 1;
            cambiarTotal();

        });
    });

    function eliminarFila(index) {
        // console.log("#fila" + index);
        $("#fila" + index).remove();
        cambiarTotal();
    }


    const cambiarTotal = () => {

        let monto = document.getElementsByName("monto[]");
        let total = document.getElementById('total');

        let count = 0;

        for (var i = 0; i < monto.length; i++) {
            count += Number(monto[i].value);
        }

        total.value = count;

    };

    const guardaryeditar = (e) => {
        e.preventDefault();
        // const form = document.getElementById("formulario12");
        // console.log(form);
        const formData = new FormData($("#formulario12")[0]);
        formData.append("total", document.getElementById("total").value);



        $.ajax({
            url: "<?= base_url() ?>index.php/detalle/insertVenta",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            success: function(datos) {
                $('#ModalPago').modal({
                    show: true
                });
                limpiar();
                console.log(datos);
            },
            error: function(jqXHR, status) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                console.log(msg);
            },
        });

        console.log("Form Data");
        for (let obj of formData) {
            console.log(obj);
        }
    };


    function limpiar() {

        $("#idInscripcion").val(0);
        $("#nombre").val("");
        $("#primerA").val("");
        $("#segundoA").val("");

        $(".even").remove();
        cambiarTotal();

    }
</script>