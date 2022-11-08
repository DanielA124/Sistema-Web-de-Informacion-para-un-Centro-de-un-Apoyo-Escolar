
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
        <h2>Modificar Datos</h2>

        <?php 
        foreach($infoUsuario->result() as $row)
        {
        echo form_open_multipart('usuario/modificarbd');?>
        <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
        <div class="row">
            <div class="col-md-3">
                <label>Nombres:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="nombres" placeholder="Ingrese el nombre" required value="<?php echo $row->nombres; ?>" class="form-control" autocomplete="off"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Apellido Paterno:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="apellidoPaterno" placeholder="Ingrese Apellido Paterno" required value="<?php echo $row->apellidoPaterno; ?>" class="form-control"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Apellido Materno:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="apellidoMaterno" placeholder="Ingrese el Apellido Materno" value="<?php echo $row->apellidoMaterno; ?>" class="form-control"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Direccion:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="direccion" placeholder="Ingrese la direccion" required value="<?php echo $row->direccion; ?>" class="form-control"><br>     
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
                <label>Celular:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="numeroCel" placeholder="" required value="<?php echo $row->numeroCel; ?>" class="form-control"><br>     
            </div>
        </div>
        
        <button type="submit" class="btn btn-success">Modificar Datos</button>
        <?php 
        echo form_close();
        }
        ?>          
        </div>
    </div>
</div>