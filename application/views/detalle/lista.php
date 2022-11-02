<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <?php echo form_open_multipart('detalle/buscarId');?>
      <div class="form-group row">
      <div class="col-md-1">
      <input class="form-control" type="search" name="idPago">
      </div>
      <div class="col-md-2">
      <button class="btn btn-warning" type="submit">
      <i class="fa fa-search"></i>
      </button>
      </div>
      </div>
      <?php echo form_close();?></td>
      <table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">           
        <thead class="bg-info text-dark">
          <tr>
            <th scope="col">Emitido por</th>
            <th scope="col">Fecha Emisión</th>
            <th scope="col">Total</th>
            <th scope="col">Fecha Inscrito</th>
            <th scope="col">Estudiante</th>
            <th scope="col">No Pagado</th>
            <th scope="col">Imprimir</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($detallepago->result() as $row)
          {
          ?>
            <tr>
                <td><?php echo $row->nombreUsuario; ?></td>
                <td><?php echo formatearFecha($row->fecha); ?></td>
                <td><?php echo $row->total; ?> Bs.</td>
                <td><?php echo $row->mes; ?>/<?php echo $row->anio; ?> </td>
                <td><?php echo $row->nombres; ?> 
                    <?php echo $row->apellidoPaterno; ?> 
                    <?php echo $row->apellidoMaterno; ?></td>
                <td align="center">                
                  <?php echo form_open_multipart('detalle/deshabilitarbd'); ?>
                  <button type="submit" class="btn btn-danger" text-align="text-center"><i class="fas fa-times"></i></button>
                  <?php echo form_close(); ?>
                </td>
                <td align="center">
                <?php echo form_open_multipart('detalle/reportepdf');?>
                  <input type="hidden" name="idPago" value="<?php echo $row->idPago;?>">
                  <button class="btn btn-dark" data-toggle="tooltip"  data-placement="top" title="Editar" formtarget="_blank">
                  <i class="fa fa-file-pdf"></i>
                  </button>
                <?php echo form_close();?></td>
            </tr>
          <?php
          $indice++;       
          }
          ?>
        </tbody>
      </table>
      <?php foreach ($pago->result() as $row)
          {
          ?>
            <p>Total: <?php echo $row->Suma; ?> Bs.</p>
            <p>Total Literal: <?php echo convertir($row->Suma); ?></p>
          <?php      
          }
          ?>
        

        <div class="row">
            <div class="col-md-6">
                <?php 
                echo form_open_multipart('detalle/agregar');
                ?>
                <button type="submit" class="btn btn-primary btn-block">Agregar Datos de Pago Completo</button>
                <?php 
                echo form_close();
                ?>  
            </div>
            <div class="col-md-6">
                <?php echo form_open_multipart('detalle/deshabilitados'); ?>
                <button type="submit" class="btn btn-warning btn-block" name="deshabilitados">Ver Detalles de Pagos Endeudados</button>
                <?php 
                echo form_close();
                ?>
            </div>
        </div>
    </div>
  </div>
</div>
