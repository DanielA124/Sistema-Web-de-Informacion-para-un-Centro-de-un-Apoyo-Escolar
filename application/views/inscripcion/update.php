
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <h2>Modificar Datos Inscripcion</h2>

        <?php 
        foreach($infoInscritos->result() as $row)
        {
        echo form_open_multipart('inscripcion/modificarbd');?>
        <input type="hidden" name="idApoderado" value="<?php echo $row->idApoderado; ?>">
        <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante; ?>">
        <div class="row">
            <div class="col-md-3">
                <label>Apoderado/a:</label>
            </div>
            <div class="col-md-9">
                <select class="form-control" required name="idApoderado" value="<?php echo $row->idApoderado; ?>">
                    <?php $apoderado=$this->db->query("SELECT idApoderado, CONCAT(persona.nombres, ' ', persona.apellidoPaterno, ' ',persona.apellidoMaterno) AS NombreA
                                                        FROM apoderado
                                                        JOIN persona ON apoderado.idApoderado=persona.idPersona;"); 
                    foreach ($apoderado->result() as $rowApoderado)
                    {
                    ?>
                        <option value="<?php echo $rowApoderado->idApoderado; ?>"><?php echo $rowApoderado->NombreA; ?></option>
                    <?php
                    }
                    ?>
                </select><br>       
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Estudiante:</label>
            </div>
            <div class="col-md-9">
                <select class="form-control" required name="idEstudiante" value="<?php echo $row->idApoderado; ?>">
                    <?php $estudiante=$this->db->query("SELECT idEstudiante, CONCAT(persona.nombres, ' ', persona.apellidoPaterno, ' ',persona.apellidoMaterno) AS NombreE
                                                        FROM estudiante
                                                        JOIN persona ON estudiante.idEstudiante=persona.idPersona;"); 
                    foreach ($estudiante->result() as $rowEstudiante)
                    {
                    ?>
                        <option value="<?php echo $rowEstudiante->idEstudiante; ?>"><?php echo $rowEstudiante->NombreE; ?></option>
                    <?php
                    }
                    ?>
                </select><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Observaciones:</label>
            </div>
            <div class="col-md-9">
                <textarea class="form-control" name="observaciones" placeholder="" required><?php echo $row->observaciones; ?></textarea>   
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