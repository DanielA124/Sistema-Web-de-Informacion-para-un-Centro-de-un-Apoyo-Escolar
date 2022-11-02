<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <h1>Inscritos con Deudas</h1>
      <table class="table table-bordered table-responsive" width="100%" cellspacing="0">           
        <thead class="bg-info text-dark">
          <tr>
            <th scope="col">Emitido por</th>
            <th scope="col">Fecha Emisión</th>
            <th scope="col">Total</th>
            <th scope="col">Fecha Inscrito</th>
            <th scope="col">Estudiante</th>
            <th scope="col">Pagado</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($general->result() as $row)
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
                <td align="center"><?php echo form_open_multipart('pago/habilitarbd'); ?>
                  <input type="hidden" name="idPago" value="<?php echo $row->idPago; ?>">
                  <button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button>
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
        <div class="col-md-6">
          <?php foreach ($total->result() as $row)
          {
          ?>
            <p>Total Perdidas: <?php echo $row->Suma; ?> Bs.</p>
          <?php      
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
