<div class="container">
    <div class="row">
        <div class="col-md-12">

        <?php 
        echo form_open_multipart('archivo/agregarbdExcel');
        ?>
        <div class="row">
            <div class="col-md-3">
                <label>Nombre:</label>
            </div>
            <div class="col-md-9">
                <select class="form-control" required name="idPlantilla">
                    <?php $plantillas=$this->db->query("SELECT idPlantilla, nombre
                                                FROM plantilla"); 
                    foreach ($plantillas->result() as $rowPlantilla)
                    {
                    ?>
                        <option value="<?php echo $rowPlantilla->idPlantilla; ?>"><?php echo $rowPlantilla->nombre; ?></option>
                    <?php
                    }
                    ?>
                </select><br>     
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label>Archivo:</label>
            </div>
            <div class="col-md-9">
                <input type="file" name="userfile" placeholder="" class="form-control-file" accept=".xls" required ><br>     
            </div>
        </div>
        

        
        <br>
        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"> </i> Agregar Archivo</button>
       
        <?php 
        echo form_close();
        ?>      
        </div>
    </div>
</div>