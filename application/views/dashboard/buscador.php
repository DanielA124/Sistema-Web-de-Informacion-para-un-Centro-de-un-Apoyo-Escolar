<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <div class="row">
            <div class="col-md-2">
                <?php 
                echo form_open_multipart('dashboard/reportID');
                ?>
                <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-chevron-left"></i>  Ir a Buscador</button>
                <?php 
                echo form_close();
                ?>  
            </div>
      </div><br>
      <h1>Reporte por ID</h1>
      <?php echo form_open_multipart('dashboard/buscarId');?>
        <div class="form-group row">
          <div class="col-md-1">
            <input class="form-control" type="search" name="idPagoMen">
          </div>
          <div class="col-md-2">
            <button class="btn btn-warning" type="submit">
            <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      <?php echo form_close();?>
      <table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">           
        <thead class="bg-info text-dark">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Usuario</th>
            <th scope="col">Fecha Registro</th>
            <th scope="col">Total</th>
            <th scope="col">Deuda</th>
            <th scope="col">Gestion Inscrito</th>
            <th scope="col">Estudiante</th>
            <th scope="col">Imprimir</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($general->result() as $row)
          {
          ?>
            <tr>
                <th scope="row"><?php echo $row->idPagoMen; ?></th>
                <td><?php echo $row->nombreUsuario; ?></td>
                <td><?php echo formatearFecha($row->fecha); ?></td>
                <td><?php echo $row->pagado; ?> Bs.</td>
                <td><?php 
                  if ($row->deuda == 0){
                      echo "Sin Pendientes";
                  }
                  else{
                      echo "$row->deuda Bs.";
                  };?><s/td>
                <td><?php echo $row->mes; ?>/<?php echo $row->anio; ?> </td>
                <td><?php echo $row->nombres; ?> 
                    <?php echo $row->apellidoPaterno; ?> 
                    <?php echo $row->apellidoMaterno; ?></td>
                <td align="center">
                <?php echo form_open_multipart('pagoMes/reportepdfCopia');?>
                  <input type="hidden" name="idPagoMen" value="<?php echo $row->idPagoMen;?>">
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
    </div>
  </div>
</div>