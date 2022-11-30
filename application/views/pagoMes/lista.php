<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <div class="table-responsive-md">
      <table id="dataTable" class="table table-bordered">           
        <thead class="bg-info text-dark" align="center">
          <tr>
            <th scope="col">Emitido por</th>
            <th scope="col">Fecha Emisión</th>
            <th scope="col">Total</th>
            <th scope="col">Pagado</th>
            <th scope="col">Fecha Inscrito</th>
            <th scope="col">Estudiante</th>
            <th scope="col">Reintegro</th>
            <th scope="col">Historial</th>
            <th scope="col">Factura</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($pago->result() as $row)
          {
          ?>
            <tr>
                <td><?php echo $row->nombreUsuario; ?></td>
                <td><?php echo formatearFecha($row->fecha); ?></td>
                <td><?php echo $row->total; ?> Bs.</td>
                <td><?php echo $row->pagado; ?> Bs.</td>
                <td><?php echo $row->mes; ?>/<?php echo $row->anio; ?> </td>
                <td><?php echo $row->nombres; ?>
                    <?php echo $row->apellidoPaterno; ?> 
                    <?php echo $row->apellidoMaterno; ?></td>
                <td align="center">
                <?php echo form_open_multipart('pagoMes/modificar');?>
                  <?php 
                  if ($row->deuda == 0){
                      echo "Sin Deudas";
                  }
                  else{
                    ?>
                      <input type="hidden" name="idPagoMen" value="<?php echo $row->idPagoMen;?>">
                      <button class="btn btn-success" data-toggle="tooltip"  data-placement="top" title="Deudas">
                      <i class="fa fa-dollar-sign"></i>
                      </button>
                    <?php
                  };?>
                  
                <?php echo form_close();?></td>
                <td align="center">
                <?php echo form_open_multipart('pagoMes/historial');?>
                  <input type="hidden" name="idPagoMen" id="idPagoMen" value="<?php echo $row->idPagoMen;?>">
                  <button class="btn btn-warning" data-toggle="tooltip"  data-placement="top" title="Historial">
                  <i class="fa fa-clipboard-list"></i>
                  </button>
                <?php echo form_close();?></td> 
                <td align="center">
                <?php echo form_open_multipart('pagoMes/reportepdfCopia');?>
                  <input type="hidden" name="idPagoMen" value="<?php echo $row->idPagoMen;?>">
                  <button class="btn btn-dark" data-toggle="tooltip"  data-placement="top" title="Fáctura" formtarget="_blank">
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
        <div class="row">
            <div class="col-md-6">
                <?php 
                echo form_open_multipart('pagoMes/pagado');
                ?>
                <button type="submit" class="btn btn-primary btn-block">Ver Detalles de Pagos</button>
                <?php 
                echo form_close();
                ?>
            </div>
            <div class="col-md-6">
                <?php echo form_open_multipart('pagoMes/deshabilitados'); ?>
                <button type="submit" class="btn btn-warning btn-block" name="deshabilitados">Ver Detalles de Pagos Endeudados</button>
                <?php 
                echo form_close();
                ?>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <?php 
                echo form_open_multipart('pagoMes/agregar');
                ?>
                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus-circle"></i>Agregar detalles de Pagos</button>
                <?php 
                echo form_close();
                ?>  
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
