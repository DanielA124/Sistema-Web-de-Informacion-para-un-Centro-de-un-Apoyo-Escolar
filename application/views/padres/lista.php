<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
       <div class="table-responsive-md">
      <table id="dataTable" class="table table-bordered">           
        <thead class="bg-info text-dark" align="center">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Dirección</th>
            <th scope="col">Edad</th>
            <th scope="col">Núm. Referencia</th>
            <th scope="col">Estado Civil</th>
            <th scope="col">Modificar</th>
            <th scope="col">Deshabilitar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($apoderado->result() as $row)
          {
          ?>
            <tr>
                <th scope="row"><?php echo $row->idApoderado; ?></th>
                <td><?php echo $row->apellidoPaterno; ?> 
                    <?php echo $row->apellidoMaterno; ?> 
                    <?php echo $row->nombres; ?></td>
                <td><?php echo $row->direccion; ?></td>
                <td><?php echo $row->edad; ?></td>
                <td><?php echo $row->numReferencia; ?></td>
                <td><?php echo $row->estadoCivil; ?></td>
                <td align="center">                  
                  <?php echo form_open_multipart('apoderado/modificar'); ?>
                  <input type="hidden" name="idApoderado" value="<?php echo $row->idApoderado; ?>">

                  <button type="submit" class=" btn btn-success"><i class="fas fa-edit"></i></button>
                  <?php echo form_close(); ?>
                </td>
                <td align="center">                
                  <?php echo form_open_multipart('apoderado/deshabilitarbd'); ?>
                  <input type="hidden" name="idApoderado" value="<?php echo $row->idApoderado; ?>">
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
                echo form_open_multipart('apoderado/agregar');
                ?>
                <button type="submit" class="btn btn-primary btn-block">Agregar Datos del Apoderado</button>
                <?php 
                echo form_close();
                ?> 
            </div>
            <div class="col-md-6">
                <?php echo form_open_multipart('apoderado/deshabilitados'); ?>
                <button type="submit" class="btn btn-warning btn-block" name="deshabilitados">Ver Padres Deshabilitados</button>
                <?php 
                echo form_close();
                ?>
            </div>
        </div>    
    </div>
  </div>
</div>
