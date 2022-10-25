<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">           
        <thead class="bg-info text-dark">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Fecha</th>
            <th scope="col">Total</th>
            <th scope="col">Usuario</th>
            <th scope="col">Modificar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($pago->result() as $row)
          {
          ?>
            <tr>
                <th scope="row"><?php echo $row->idPago; ?></th>
                <td><?php echo formatearFecha($row->fecha); ?></td>
                <td><?php echo $row->total; ?></td>
                <td><?php echo $this->session->userdata('nombreUsuario') ?></td>
                <td align="center">                  
                  <?php echo form_open_multipart('pago/modificar'); ?>
                  <input type="hidden" name="idPago" value="<?php echo $row->idPago; ?>">

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
                echo form_open_multipart('pago/agregar');
                ?>
                <button type="submit" class="btn btn-primary btn-block">Agregar Datos del Pago</button>
                <?php 
                echo form_close();
                ?> 
            </div>
        </div>    
    </div>
  </div>
</div>
