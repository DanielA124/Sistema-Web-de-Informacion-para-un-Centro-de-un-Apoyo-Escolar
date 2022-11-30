<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
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
            <th scope="col">Modificar</th>
            <th scope="col">Deshabilitar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($estudiante->result() as $row)
          {
          ?>
            <tr>
                <th scope="row"><?php echo $row->idEstudiante; ?></th>
                <td><?php echo $row->apellidoPaterno; ?> 
                    <?php echo $row->apellidoMaterno; ?> 
                    <?php echo $row->nombres; ?></td>
                <td><?php echo $row->edad; ?></td>
                <td>
                  <?php 
                  if ($row->sexo == 'H'){
                      echo "HOMBRE";
                  }
                  else{
                      echo "MUJER";
                  };?>
                </td>
                <td><?php echo $row->colegio; ?></td>
                <td><?php echo $row->grado; ?></td>

                <td align="center">                  
                  <?php echo form_open_multipart('estudiante/modificar'); ?>
                  <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante; ?>">

                  <button type="submit" class=" btn btn-success"><i class="fas fa-edit"></i></button>
                  <?php echo form_close(); ?>
                </td>
                <td align="center">                
                  <?php echo form_open_multipart('estudiante/deshabilitarbd'); ?>
                  <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante; ?>">
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
            <div class="col-md-6">
                <?php 
                echo form_open_multipart('estudiante/agregar');
                ?>
                <button type="submit" class="btn btn-primary btn-block">Agregar Datos del Estudiante</button>
                <?php 
                echo form_close();
                ?>
            </div>
            <div class="col-md-6">
                <?php echo form_open_multipart('estudiante/deshabilitados'); ?>
                <button type="submit" class="btn btn-warning btn-block" name="deshabilitados">Ver Estudiantes Deshabilitados</button>
                <?php 
                echo form_close();
                ?>
            </div>
        </div>           
    </div>
  </div>
</div>
