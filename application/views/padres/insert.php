<div class="container">
    <div class="row">
        <div class="col-md-12">

        <?php 
        echo form_open_multipart('apoderado/agregarbd');
        ?>
        <div class="row">
            <div class="col-md-3">
                <label>Nombres:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="nombres" placeholder="" class="form-control" required><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Primer Apellido:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="apellidoPaterno" placeholder="" class="form-control" required><br>    
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Segundo Apellido:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="apellidoMaterno" placeholder="" class="form-control"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Direccion:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="direccion" placeholder="" class="form-control" required><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Edad:</label>
            </div>
            <div class="col-md-9">
                <input type="number" id="tentacles" min="20" max="80" name="edad" placeholder="" class="form-control" required><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Núm. Referencia:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="numReferencia" placeholder="" class="form-control" required><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Estado Civil:</label>
            </div>
        <div class="col-md-9">
            <select class="form-control" required name="estadoCivil">
                <option>Soltero/a</option>
                <option>Casado/a</option>
                <option>Divorciado/a</option>
                <option>Viudo/a</option>
            </select><br>     
            </div>
        </div>
        
        <br>
        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"> </i> Agregar Datos Apoderado</button>
       
        <?php 
        echo form_close();
        ?>      
        </div>
    </div>
</div>