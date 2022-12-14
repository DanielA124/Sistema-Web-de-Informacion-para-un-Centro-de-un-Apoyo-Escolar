
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <h2>Modificar Datos</h2>

        <?php 
        foreach($infopadre->result() as $row)
        {
        echo form_open_multipart('apoderado/modificarbd');?>
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
                <input type="number" id="tentacles" min="20" max="80" name="edad" placeholder="" class="form-control" required value="<?php echo $row->edad; ?>"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>N??m. Referencia:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="numReferencia" placeholder="" class="form-control" required value="<?php echo $row->numReferencia; ?>"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Estado Civil:</label>
            </div>
        <div class="col-md-9">
            <select class="form-control" required name="estadoCivil" value="<?php echo $row->estadoCivil; ?>">                   
                <option>Soltero/a</option>
                <option>Casado/a</option>
                <option>Divorciado/a</option>
                <option>Viudo/a</option>
            </select><br>     
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