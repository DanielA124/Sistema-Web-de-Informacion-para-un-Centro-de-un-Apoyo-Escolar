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
                <label>Edad:</label>
            </div>
            <div class="col-md-1">
                <input type="number" id="tentacles" value="5" min="5" max="14" name="edad" class="form-control" required><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Sexo:</label>
            </div>
        <div class="col-md-1">
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
            <div class="col-md-2">
                <select class="form-select form-control" aria-label="Default select example" required name="grado" >
                <option>Kinder</option>
                <option>1ro. Prim.</option>
                <option>2do. Prim.</option>
                <option>3ro. Prim.</option>
                <option>4to. Prim.</option>
                <option>5to. Prim.</option>
                <option>6to. Prim.</option>
                <option>1ro. Sec.</option>
                <option>2do. Sec.</option>
                </select><br>   
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