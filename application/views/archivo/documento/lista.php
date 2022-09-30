<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">           
        <thead>
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo</th>
            <th scope="col">Plantilla</th>
            <th scope="col">Modificar</th>
            <th scope="col">Deshabilitar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($archivos->result() as $row)
          {
          ?>
            <tr>
                <th scope="row"><?php echo $row->idArchivo; ?></th>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->tipo; ?></td>
                <td align="center">
                    <?php echo $row->idPlantilla; ?>
                </td>
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
        <?php echo form_open_multipart('archivo/agregar'); ?>
        <button type="submit" class="btn btn-primary">Agregar Enciclopedia</button>
        <?php 
        echo form_close(); 
        ?>     
        <?php echo form_open_multipart('plantilla/deshabilitados'); ?>
        <button type="submit" class="btn btn-warning" name="deshabilitados">Ver Enciclopedias Deshabilitadas</button>
        <?php 
        echo form_close();
        ?>
    </div>
  </div>
</div>
