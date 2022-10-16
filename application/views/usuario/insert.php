<div class="container">
    <div class="row">
        <div class="col-md-12">

        <?php 
        echo form_open_multipart('usuario/agregarbd');
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
                <label>Horario:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="horario" placeholder="" class="form-control" required><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Num. Celular:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="numeroCel" placeholder="" class="form-control" required><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Nombre de Usuario:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="nombreUsuario" placeholder="" class="form-control" required><br>     
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