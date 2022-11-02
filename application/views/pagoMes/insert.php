<div class="container" >
    <div class="row">
        <div class="col-md-12">
         <?php 
            echo form_open_multipart('pagoMes/agregarbd');
        ?>
                <h2>Datos del Estudiante</h2>
            <div class="row">
                <div class="col-md-2">
                    <label>Nombres:</label>
                </div>
                <div class="col-md-3">
                    <input type="search" id="nombres" class="form-control"></input>
                    <input class="form-control" name="idInscripcion" id="idInscripcion" type="hidden" value=""><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Ap. Paterno:</label>
                </div>
                <div class="col-md-3">
                    <input id="primerA" disabled class="form-control" placeholder="" value=""></input><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Ap. Materno:</label>
                </div>
                <div class="col-md-3">
                    <input id="segundoA" disabled class="form-control" placeholder="" value=""></input><br>
                </div>
            </div>
        </div>
    </div><!-- Fin Div row --><br>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Datos para el Pago</h2>
            <div class="row">
                <div class="col-md-2">
                    <label>Total:</label>
                </div>
                <div class="col-md-3">
                    <input name="total" class="form-control" placeholder="" value="300" readonly></input><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Pagado:</label>
                </div>
                <div class="col-md-3">
                    <input name="pagado" class="form-control" placeholder="" value="" required></input><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Mes:</label>
                </div>
                <div class="col-md-3">
                    <select class="form-select form-control" aria-label="Default select example" required name="mes" >
                    <option>Enero</option>
                    <option>Febrero</option>
                    <option>Marzo</option>
                    <option>Abril</option>
                    <option>Mayo</option>
                    <option>Junio</option>
                    <option>Julio</option>
                    <option>Agosto</option>
                    <option>Septiembre</option>
                    <option>Octubre</option>
                    <option>Noviembre</option>
                    <option>Diciembre</option>
                    </select><br>
                </div>
            </div>
            <button type="submit" class="btn btn-success">
                   <i class="fa fa-plus-circle"></i>  Insertar
            </button>
            <?php 
                echo form_close();
            ?>
        </div><!-- Fin Div x_panel -->
    </div><!-- Fin Div col-md-12 col-sm-12  -->
</div><!-- Fin Div row --> 

<!-- ✅ Load CSS file for jQuery ui  -->
<link href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />

<!-- ✅ load jQuery ✅ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- ✅ load jQuery UI ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

    $("#nombres").autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: "<?= base_url() ?>index.php/pagoMes/estudianteList",
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
            return false;
        }
    });

    function limpiar() {

        $("#idInscripcion").val(0);
        $("#nombre").val("");
        $("#primerA").val("");
        $("#segundoA").val("");

        $(".even").remove();

    }
</script>