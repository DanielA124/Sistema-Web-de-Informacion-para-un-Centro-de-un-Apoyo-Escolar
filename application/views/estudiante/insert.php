<div class="container">
    <div class="row">
        <div class="col-md-12">

        <?php 
        echo form_open_multipart('estudiante/agregarbd');
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
                <input type="number" id="tentacles" value="5" min="5" max="14" name="edad" class="form-control" required><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Sexo:</label>
            </div>
        <div class="col-md-9">
            <select class="form-select form-control" aria-label="Default select example" required name="sexo">
                <option>H</option>
                <option>M</option>
            </select><br>    
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Colegio:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="colegio" placeholder="" class="form-control" required><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Grado:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="grado" placeholder="" class="form-control" required><br>     
            </div>
        </div>
        
        
        <br>
        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"> </i> Agregar Datos Estudiante</button>
       
        <?php 
        echo form_close();
        ?>      
        </div>
    </div>
</div>