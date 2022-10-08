<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">           
        <thead class="bg-info text-dark">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre Completo Padre</th>
            <th scope="col">Nombre Completo Estudiante</th>
            <th scope="col">Observacion</th>
            <th scope="col">Horario</th>
            <th scope="col">Modificar</th>
            <th scope="col">Deshabilitar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($inscripcion->result() as $row)
          {
          ?>
            <tr>
                <th scope="row"><?php echo $row->idInscripcion; ?></th>
                <td><?php echo $row->ANombre; ?> 
                    <?php echo $row->AApP; ?> 
                    <?php echo $row->AApM; ?></td>
                <td><?php echo $row->ENombre; ?> 
                    <?php echo $row->EApP; ?> 
                    <?php echo $row->EApM; ?></td>
                <td><?php echo $row->observaciones; ?></td>
                <td><?php echo $row->horario; ?></td>

                <td align="center">                  
                  <?php echo form_open_multipart('inscripcion/modificar'); ?>
                  <input type="hidden" name="idInscripcion" value="<?php echo $row->idInscripcion; ?>">

                  <button type="submit" class=" btn btn-success"><i class="fas fa-edit"></i></button>
                  <?php echo form_close(); ?>
                </td>
                <td align="center">                
                  <?php echo form_open_multipart('inscripcion/deshabilitarbd'); ?>
                  <input type="hidden" name="idInscripcion" value="<?php echo $row->idInscripcion; ?>">
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
        <?php 
        echo form_open_multipart('inscripcion/agregar');
        ?>
        <button type="submit" class="btn btn-primary">Agregar Datos para Inscripcion</button>
        <?php 
        echo form_close();
        ?>
        <?php echo form_open_multipart('inscripcion/deshabilitados'); ?>
        <button type="submit" class="btn btn-warning" name="deshabilitados">Ver Inscripciones Deshabilitadas</button>
        <?php 
        echo form_close();
        ?>
    </div>
  </div>
</div>
