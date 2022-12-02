<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <div class="table-responsive-md">
      <table id="dataTable" class="table table-bordered">           
        <thead class="bg-info text-dark" align="center">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo</th>
            <th scope="col">Plantilla</th>
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
                <td><a href="<?php echo base_url(); ?>files/<?php echo $row->tipo; ?>"><?php echo $row->tipo; ?></a></td>
                <td><?php echo $row->idPlantilla; ?></td>
                <td align="center">                
                  <?php echo form_open_multipart('archivo/deshabilitarbd'); ?>
                  <input type="hidden" name="idArchivo" value="<?php echo $row->idArchivo; ?>">
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
      </div>
      <div class="row">
            <div class="col-md-3">
                <?php echo form_open_multipart('archivo/agregarWord'); ?>
                <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-file-word">   Agregar Word</i></button>
                <?php 
                echo form_close(); 
                ?>
            </div>
            <div class="col-md-3">
                <?php echo form_open_multipart('archivo/agregarExcel'); ?>
                <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-file-excel">   Agregar Excel</i></button>
                <?php 
                echo form_close(); 
                ?>     
            </div>
            <div class="col-md-3">
                <?php echo form_open_multipart('archivo/agregarPDF'); ?>
                <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-file-pdf">   Agregar PDF</i></button>
                <?php 
                echo form_close(); 
                ?>     
            </div>
            <div class="col-md-3">
                <?php echo form_open_multipart('archivo/agregarJPG'); ?>
                <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-file-image">   Agregar Imágen</i></button>
                <?php 
                echo form_close(); 
                ?>     
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <?php echo form_open_multipart('archivo/deshabilitados'); ?>
                <button type="submit" class="btn btn-warning btn-block" name="deshabilitados">Ver Documentos Deshabilitados</button>
                <?php 
                echo form_close();
                ?>
            </div>
        </div>    
    </div>
  </div>
</div>
