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
            <th scope="col">Horario</th>
            <th scope="col">Número Celular</th>
            <th scope="col">Creado</th>
            <th scope="col">Modificado</th>
            <th scope="col">Modificar</th>
            <th scope="col">Deshabilitar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($usuario->result() as $row)
          {
          ?>
            <tr>
                <th scope="row"><?php echo $row->idUsuario; ?></th>
                <td><?php echo $row->nombres; ?> 
                <?php echo $row->apellidoPaterno; ?> 
                <?php echo $row->apellidoMaterno; ?></td>
                <td><?php echo $row->direccion; ?></td>
                <td><?php echo $row->horario; ?></td>
                <td><?php echo $row->numeroCel; ?></td>
                <td><?php echo $row->fechaReg; ?></td>
                <td><?php echo $row->fechaAct; ?></td>
                <td align="center">                  
                  <?php echo form_open_multipart('usuario/modificar'); ?>
                  <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">

                  <button type="submit" class=" btn btn-success"><i class="fas fa-edit"></i></button>
                  <?php echo form_close(); ?>
                </td>
                <td align="center">                
                  <?php echo form_open_multipart('usuario/deshabilitarbd'); ?>
                  <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
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
                echo form_open_multipart('usuario/agregar');
                ?>
                <button type="submit" class="btn btn-primary btn-block">Agregar Datos del Usuario</button>
                <?php 
                echo form_close();
                ?>  
            </div>
            <div class="col-md-6">
                <?php echo form_open_multipart('usuario/deshabilitados'); ?>
                <button type="submit" class="btn btn-warning btn-block" name="deshabilitados">Ver Datos Deshabilitados</button>
                <?php 
                echo form_close();
                ?>
            </div>
        </div>
    </div>
  </div>
</div>
