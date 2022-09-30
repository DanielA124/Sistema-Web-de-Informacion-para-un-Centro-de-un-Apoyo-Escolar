
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <h2>Modificar Datos</h2>

        <?php 
        foreach($infoestudiante->result() as $row)
        {
        echo form_open_multipart('estudiante/modificarbd');?>
        <input type="hidden" name="idPersona" value="<?php echo $row->idPersona; ?>">
        <div class="row">
            <div class="col-md-3">
                <label>Nombres:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="nombres" placeholder="Ingrese el nombre" required value="<?php echo $row->nombres; ?>" class="form-control"><br>     
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
                <label>Edad:</label>
            </div>
            <div class="col-md-9">
                <input type="number" id="tentacles" min="5" max="14" name="edad" placeholder="" class="form-control" required value="<?php echo $row->edad; ?>"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Sexo:</label>
            </div>
        <div class="col-md-9">
            <select class="form-control" required name="sexo" value="<?php echo $row->sexo; ?>">                   
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
                <input type="text" name="colegio" placeholder="Ingrese el colegio" required value="<?php echo $row->colegio; ?>" class="form-control"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Grado:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="grado" placeholder="Ingrese el colegio" required value="<?php echo $row->grado; ?>" class="form-control"><br>
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