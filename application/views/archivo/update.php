
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <h2>Modificar Datos</h2>

        <?php 
        foreach($infodatos->result() as $row)
        {
        echo form_open_multipart('plantilla/modificarbd');?>
        <input type="hidden" name="idPlantilla" value="<?php echo $row->idPlantilla; ?>">
        <div class="row">
            <div class="col-md-3">
                <label>Nombre:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="nombre" placeholder="Ingrese el nombre" required value="<?php echo $row->nombre; ?>" class="form-control"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Documento:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="documento" placeholder="Ingrese Documento" required value="<?php echo $row->documento; ?>" class="form-control"><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Materia:</label>
            </div>
            <div class="col-md-9">
                <select class="form-control" required name="idMateria">
                    <?php $materias=$this->db->query("SELECT idMateria, nombreMateria
                                                FROM materia"); 
                    foreach ($materias->result() as $rowmateria)
                    {
                    ?>
                        <option value="<?php echo $rowmateria->idMateria; ?>"><?php echo $rowmateria->nombreMateria; ?></option>
                    <?php
                    }
                    ?>
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