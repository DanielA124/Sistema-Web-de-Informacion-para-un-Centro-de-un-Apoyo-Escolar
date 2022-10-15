<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">           
        <thead class="bg-info text-dark">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Mes</th>
            <th scope="col">Año</th>
            <th scope="col">Monto</th>
            <th scope="col">Estudiante</th>
            <th scope="col">Modificar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($mensualidad->result() as $row)
          {
          ?>
            <tr>
                <th scope="row"><?php echo $row->idMensualidad; ?></th>
                <td><?php echo $row->mes; ?></td>
                <td><?php echo $row->anio; ?></td>
                <td><?php echo $row->monto; ?></td>
                <td><?php echo $row->ENombre; ?> 
                    <?php echo $row->EApP; ?> 
                    <?php echo $row->EApM; ?></td>
                <td align="center">                  
                  <?php echo form_open_multipart('mensualidad/modificar'); ?>
                  <input type="hidden" name="idMensualidad" value="<?php echo $row->idMensualidad; ?>">

                  <button type="submit" class=" btn btn-success"><i class="fas fa-edit"></i></button>
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
                <?php 
                echo form_open_multipart('mensualidad/agregar');
                ?>
                <button type="submit" class="btn btn-primary btn-block">Agregar Datos de la Mensualidad</button>
                <?php 
                echo form_close();
                ?> 
            </div>
        </div>    
    </div>
  </div>
</div>
