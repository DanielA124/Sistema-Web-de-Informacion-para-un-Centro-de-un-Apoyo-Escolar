<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <div class="row">
            <div class="col-md-2">
                <?php 
                echo form_open_multipart('pagoMes/index');
                ?>
                <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-chevron-left"></i>  Ir a Lista Principal</button>
                <?php 
                echo form_close();
                ?>  
            </div>
        </div>
      <table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">           
        <thead class="bg-info text-dark">
          <tr>
            <th scope="col">Emitido por</th>
            <th scope="col">Fecha Emisión</th>
            <th scope="col">Total</th>
            <th scope="col">Pagado</th>
            <th scope="col">Deuda</th>
            <th scope="col">Fecha Inscrito</th>
            <th scope="col">Estudiante</th>
            <th scope="col">Reintegro</th>
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
                <td><?php echo $row->deuda; ?> Bs.</td>
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
            </tr>
          <?php
          $indice++;       
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
