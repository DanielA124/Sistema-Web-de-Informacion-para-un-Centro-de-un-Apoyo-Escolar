<div class="container">
    <div class="row">
        <div class="col-md-12">

        <?php 
        echo form_open_multipart('plantilla/agregarbd');
        ?>
        <div class="row">
            <div class="col-md-3">
                <label>Nombre:</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="nombre" placeholder="" class="form-control" required><br>     
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

        
        <br>
        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"> </i> Agregar Enciclopedia</button>
       
        <?php 
        echo form_close();
        ?>      
        </div>
    </div>
</div>