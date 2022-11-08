<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="row">
            <div class="col-md-2">
                <?php 
                echo form_open_multipart('usuario/index');
                ?>
                <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-chevron-left"></i>  Volver</button>
                <?php 
                echo form_close();
                ?>  
            </div>
        </div><br>
        <h2>Insertar</h2>
        <?php 
        echo form_open_multipart('usuario/agregarbd');
        ?>
        <div class="row">
            <div class="col-md-3">
                <label>Nombres:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="nombres" placeholder="" class="form-control" required autocomplete="off"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Primer Apellido:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="apellidoPaterno" placeholder="" class="form-control" required autocomplete="off"><br>    
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Segundo Apellido:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="apellidoMaterno" placeholder="" class="form-control" autocomplete="off"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Direccion:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="direccion" placeholder="" class="form-control" required autocomplete="off"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Horario:</label>
            </div>
            <div class="col-md-2">
                <select class="form-select form-control" aria-label="Default select example" required name="horario" >
                <option>Mañana</option>
                <option>Tarde</option>
                <option>Nocturno</option>
                </select><br>   
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Num. Celular:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="numeroCel" placeholder="" class="form-control" required autocomplete="off"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Nombre de Usuario:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="nombreUsuario" placeholder="" class="form-control" required autocomplete="off"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Contraseña:</label>
            </div>
            <div class="col-md-9">
                <input type="password" name="password" placeholder="" class="form-control" required><br>     
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"> </i> Agregar Datos Usuario</button>
       
        <?php 
        echo form_close();
        ?>      
        </div>
    </div>
</div>