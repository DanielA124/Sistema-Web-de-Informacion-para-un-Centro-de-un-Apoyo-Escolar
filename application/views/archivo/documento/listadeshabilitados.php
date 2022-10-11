<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">

        <h1>Lista de Documentos Deshabilitados</h1>
<table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">
  <thead class="bg-info text-dark">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo</th>
            <th scope="col">Plantilla</th>
            <th scope="col">Habilitar</th>
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
                <td><?php echo $row->idPlantilla; ?></td>
                <td align="center">                
                  <?php echo form_open_multipart('archivo/habilitarbd'); ?>
                  <input type="hidden" name="idArchivo" value="<?php echo $row->idArchivo; ?>">
                  <button type="submit" class="btn btn-success" text-align="text-center"><i class="fas fa-check"></i></button>
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
            <div class="col-md-12">
                <?php echo form_open_multipart('archivo/index'); ?>
                <button type="submit" class="btn btn-primary btn-block" >Ver Documentos Habilitados</button>
                <?php echo form_close(); ?>
            </div>
        </div>
      </div>
    </div>
</div>