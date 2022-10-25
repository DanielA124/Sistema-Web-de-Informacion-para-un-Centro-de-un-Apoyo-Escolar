<div class="container">
    <div class="row">
        <div class="col-md-12">

        <?php 
        echo form_open_multipart('mensualidad/agregarbd');
        ?>
        <div class="row">
            <div class="col-md-3">
                <label>Mes:</label>
            </div>
            <div class="col-md-9">
                <select class="form-select form-control" aria-label="Default select example" required name="mes" >
                <option>Enero</option>
                <option>Febrero</option>
                <option>Marzo</option>
                <option>Abril</option>
                <option>Mayo</option>
                <option>Junio</option>
                <option>Julio</option>
                <option>Agosto</option>
                <option>Septiembre</option>
                <option>Octubre</option>
                <option>Noviembre</option>
                <option>Diciembre</option>
                </select><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Año:</label>
            </div>
            <div class="col-md-9">
                <select class="form-select form-control" aria-label="Default select example" required name="anio" >
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                </select><br>   
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Monto:</label>
            </div>
            <div class="col-md-9">
                <input type="double" name="monto" placeholder="" class="form-control" required><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Inscrito:</label>
            </div>
            <div class="col-md-9">
                <select class="form-control" required name="idInscripcion">
                    <?php $inscripcion=$this->db->query("SELECT inscripcion.idInscripcion, inscripcion.idEstudiante, 
                                                        CONCAT(estudiante.nombres, ' ', estudiante.apellidoPaterno, ' ',IFNULL(estudiante.apellidoMaterno,  ' ')) AS NombreE
                                                        FROM inscripcion
                                                        JOIN estudiante ON inscripcion.idEstudiante=estudiante.idEstudiante"); 
                    foreach ($inscripcion->result() as $rowInscritos)
                    {
                    ?>
                        <option value="<?php echo $rowInscritos->idInscripcion; ?>"><?php echo $rowInscritos->NombreE; ?></option>
                    <?php
                    }
                    ?>
                </select><br>
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"> </i> Agregar Datos Mensualidad</button>
       
        <?php 
        echo form_close();
        ?>      
        </div>
    </div>
</div>