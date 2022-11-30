<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
        <h1>Lista de Inscritos Deshabilitados</h1>
         <div class="table-responsive-md">
          <table id="dataTable" class="table table-bordered">
            <thead class="bg-info text-dark">
                    <tr>
                      <th scope="col">N°</th>
                      <th scope="col">Nombre Completo Padre</th>
                      <th scope="col">Nombre Completo Estudiante</th>
                      <th scope="col">Observacion</th>
                      <th scope="col">Horario</th>
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
                            <?php echo form_open_multipart('inscripcion/habilitarbd'); ?>
                            <input type="hidden" name="idInscripcion" value="<?php echo $row->idInscripcion; ?>">
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
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo form_open_multipart('inscripcion/index'); ?>
                <button type="submit" class="btn btn-primary btn-block" >Ver Inscritos Habilitados</button>
                <?php echo form_close(); ?>  
            </div>
        </div>
      </div>
    </div>
</div>