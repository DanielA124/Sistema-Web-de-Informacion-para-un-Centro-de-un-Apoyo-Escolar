<div class="card shadow">
  <div class="card-body">
      <div class="row sm-12">
            <div class="col-md-3" align="left">
                <?php echo form_open_multipart('pagoMes/index'); ?>
                <button type="submit" class="btn btn-dark"><i class="fa fa-chevron-left"></i> Volver</button>
                <?php echo form_close(); ?>  
            </div>
            <div class="col-md-9" align="right">
              <?php echo form_open_multipart('pagoMes/historialPDF'); ?>
                  <form  method="POST">
                  <input hidden name="idPagoMen" id="idPagoMen" value="<?php echo $idPagoMen ?>">
                  <button type="submit" class="btn btn-danger" formtarget="_blank"><i class="fa fa-file-pdf"></i> Imprimir Historial</button>
                  </form>
              <?php echo form_close(); ?>
            </div>
            
      </div><br><br>
      <div class="table-responsive-md">
      <table class="table table-bordered">           
        <thead class="bg-info text-dark" align="center">
          <tr>
            <th scope="col">Estudiante</th>
            <th scope="col">Pagado</th>
            <th scope="col">Fecha Pagado</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          $suma=0;
          foreach ($infoHistorial->result() as $row)
          {
             $suma=$suma+$row->saldo;
          ?>
            <tr>
                <td><?php echo $row->ENombre; ?>
                    <?php echo $row->EPaterno; ?> 
                    <?php echo $row->EMaterno; ?></td>
                <td><?php echo $row->saldo; ?> Bs.</td>
                <td><?php echo formatearFecha($row->fechaReg); ?></td>
                <?php echo form_close();?></td>
            </tr>
          <?php
          $indice++;       
          }
          ?>
        </tbody>
      </table>
    </div>
    <?php echo 'Saldo Pagado: '.$suma; ?>
  </div>
</div>
