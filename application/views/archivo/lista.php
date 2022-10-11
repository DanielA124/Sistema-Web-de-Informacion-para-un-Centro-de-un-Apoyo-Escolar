<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">           
        <thead class="bg-info text-dark">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha Reg.</th>
            <th scope="col">Fecha Act.</th>
            <th scope="col">Materia</th>
            <th scope="col">Modificar</th>
            <th scope="col">Deshabilitar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($plantilla->result() as $row)
          {
          ?>
            <tr>
                <th scope="row"><?php echo $row->idPlantilla; ?></th>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->fechaReg; ?></td>
                <td><?php echo $row->fechaAct; ?></td>
                <td><?php echo $row->nombreMateria; ?></td>
                <td>                  
                  <?php echo form_open_multipart('plantilla/modificar'); ?>
                  <input type="hidden" name="idPlantilla" value="<?php echo $row->idPlantilla; ?>">

                  <button type="submit" class=" btn btn-success"><i class="fas fa-edit"></i></button>
                  <?php echo form_close(); ?>
                </td>
                <td>                
                  <?php echo form_open_multipart('plantilla/deshabilitarbd'); ?>
                  <input type="hidden" name="idPlantilla" value="<?php echo $row->idPlantilla; ?>">
                  <button type="submit" class="btn btn-danger" text-align="text-center"><i class="fas fa-times"></i></button>
                  <?php echo form_close(); ?>
                </td>
            </tr>
          <?php
          $indice++;       
          }
          ?>
        </tbody>
      </table>
      <div class="row">
            <div class="col-md-6">
                <?php echo form_open_multipart('plantilla/agregar');?>
                <button type="submit" class="btn btn-primary btn-block">Agregar Archivos</button>
                <?php 
                echo form_close();
                ?>
            </div>
            <div class="col-md-6">
                <?php echo form_open_multipart('plantilla/deshabilitados'); ?>
                <button type="submit" class="btn btn-warning btn-block" name="deshabilitados">Ver Archivos Deshabilitadas</button>
                <?php 
                echo form_close();
                ?>
            </div>
        </div>        
    </div>
  </div>
</div>
