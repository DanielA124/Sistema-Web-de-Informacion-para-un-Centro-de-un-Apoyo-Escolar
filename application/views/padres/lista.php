<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">           
        <thead>
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
                <th scope="row"><?php echo $row->idPersona; ?></th>
                <td><?php echo $row->apellidoPaterno; ?> 
                    <?php echo $row->apellidoMaterno; ?> 
                    <?php echo $row->nombres; ?></td>
                <td><?php echo $row->direccion; ?></td>
                <td><?php echo $row->edad; ?></td>
                <td><?php echo $row->numReferencia; ?></td>
                <td><?php echo $row->estadoCivil; ?></td>
                <td>                  
                  <?php echo form_open_multipart('apoderado/modificar'); ?>
                  <input type="hidden" name="idPersona" value="<?php echo $row->idPersona; ?>">

                  <button type="submit" class=" btn btn-success"><i class="fas fa-edit"></i></button>
                  <?php echo form_close(); ?>
                </td>
                <td>                
                  <?php echo form_open_multipart('apoderado/deshabilitarbd'); ?>
                  <input type="hidden" name="idPersona" value="<?php echo $row->idPersona; ?>">
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
        echo form_open_multipart('apoderado/agregar');
        ?>
        <button type="submit" class="btn btn-primary">Agregar Datos de Apoderado</button>
        <?php 
        echo form_close();
        ?>
        <?php echo form_open_multipart('apoderado/deshabilitados'); ?>
        <button type="submit" class="btn btn-warning" name="deshabilitados">Ver Padres Deshabilitados</button>
        <?php 
        echo form_close();
        ?>
    </div>
  </div>
</div>
