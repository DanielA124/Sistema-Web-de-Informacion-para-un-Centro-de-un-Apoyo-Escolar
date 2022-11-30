<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
        <h1>Lista de Estudiantes deshabilitados</h1>
         <div class="table-responsive-md">
          <table id="dataTable" class="table table-bordered">
            <thead class="bg-info text-dark" align="center">
              <tr>
                  <th scope="col">N°</th>
                      <th scope="col">Nombre Completo</th>
                      <th scope="col">Edad</th>
                      <th scope="col">Sexo</th>
                      <th scope="col">Colegio</th>
                      <th scope="col">Grado</th>
                      <th scope="col">Habilitar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $indice=1;
                    foreach ($apoderado->result() as $row)
                    {
                    ?>
                      <tr>
                          <th scope="row"><?php echo $row->idEstudiante; ?></th>
                          <td><?php echo $row->apellidoPaterno; ?> 
                              <?php echo $row->apellidoMaterno; ?> 
                              <?php echo $row->nombres; ?></td>
                          <td><?php echo $row->edad; ?></td>
                          <td><?php echo $row->sexo; ?></td>
                          <td><?php echo $row->colegio; ?></td>
                          <td><?php echo $row->grado; ?></td>
          
                          <td align="center">        
                            <?php echo form_open_multipart('estudiante/habilitarbd'); ?>
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
            </table><br>
          </div>
          <div class="row">
            <div class="col-md-12">
                <?php echo form_open_multipart('estudiante/index'); ?>
                <button type="submit" class="btn btn-primary btn-block" >Ver Estudiantes Habilitados</button>
                <?php echo form_close(); ?>
            </div>
          </div>    
        </div>
    </div>
</div>