<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">

        <h1>Lista de Inscritos Deshabilitados</h1>
<table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">
  <thead>
        <tr>
          <th scope="col">N° Apoderado</th>
          <th scope="col">Nombre Completo Padre</th>
          <th scope="col">N° Estudiante</th>
          <th scope="col">Nombre Completo Estudiante</th>
          <th scope="col">Observacion</th>
          <th scope="col">Habilitar</th>
        </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($inscritos->result() as $row)
          {
          ?>
            <tr>
                <th scope="row"><?php echo $row->idApoderado; ?></th>
                <td><?php echo $row->EapPat; ?> 
                    <?php echo $row->EapMat; ?> 
                    <?php echo $row->Enombre; ?></td>
                <td><?php echo $row->idEstudiante; ?></td>
                <td><?php echo $row->AapPat; ?> 
                    <?php echo $row->AapMat; ?> 
                    <?php echo $row->Anombre; ?></td>
                <td><?php echo $row->observaciones; ?></td>

                <td>        
                  <?php echo form_open_multipart('inscripcion/habilitarbd'); ?>
                  <input type="hidden" name="idApoderado" value="<?php echo $row->idApoderado; ?>">
                  <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante; ?>">
                  <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
                  <?php echo form_close(); ?>
                </td>
            </tr>
        <?php
        $indice++;
        
    }
    ?>

  </tbody>
</table>
        <?php echo form_open_multipart('inscripcion/index'); ?>
        <button type="submit" class="btn btn-primary" >Ver Inscritos Habilitados</button>
        <?php echo form_close(); ?>
        <br>
        </div>
    </div>
</div>