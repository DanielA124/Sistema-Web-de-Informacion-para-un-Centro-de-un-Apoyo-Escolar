<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <h1>Reporte General</h1>
      <div class=" table-responsive-md">
      <table id="dataTable" class="table table-bordered" width="100%" cellspacing="0">           
        <thead class="bg-info text-dark" align="center">
          <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Fecha Registro</th>
            <th scope="col">Total</th>
            <th scope="col">Pagado</th>
            <th scope="col">Deuda</th>
            <th scope="col">Gestion Inscrito</th>
            <th scope="col">Estudiante</th>
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
                <td><?php echo $row->pagado; ?> Bs.</td>
                <td><?php 
                  if ($row->deuda == 0){
                      echo "Sin Pendientes";
                  }
                  else{
                      echo "$row->deuda Bs.";
                  };?></td>
                <td><?php echo $row->mes; ?>/<?php echo $row->anio; ?> </td>
                <td><?php echo $row->nombres; ?> 
                    <?php echo $row->apellidoPaterno; ?> 
                    <?php echo $row->apellidoMaterno; ?></td>
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
          <?php foreach ($total->result() as $row)
          {
          ?>
            <p>Total: <?php echo $row->Suma; ?> Bs.</p>
            <p>Total Literal: <?php echo convertir($row->Suma); ?></p>
          <?php      
          }
          ?>
        </div>
        <div class="col-md-6" align="right">
          <?php echo form_open_multipart('dashboard/generalPDF'); ?>
            <button type="submit" class="btn btn-danger" name="enviar" formtarget="_blank"><i class="fa fa-file-pdf"></i>  Imprimir Reporte</button>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
