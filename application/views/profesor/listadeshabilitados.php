<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">

        <h1>Lista de Padres deshabilitados</h1>
<table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">
  <thead>
    <tr>
        <th scope="col">N°</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Dirección</th>
            <th scope="col">Edad</th>
            <th scope="col">Núm. Referencia</th>
            <th scope="col">Estado Civil</th>
            <th scope="col">Habilitar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $indice=1;
          foreach ($apoderado->result() as $row)
          {
          ?>
            <tr>
                <th scope="row"><?php echo $row->idPersona; ?></th>
                <td><?php echo $row->apellidoPaterno; ?> 
                    <?php echo $row->apellidoMaterno; ?> 
                    <?php echo $row->nombres; ?></td>
                <td><?php echo $row->direccion; ?></td>
                <td><?php echo $row->edad; ?></td>
                <td><?php echo $row->numReferencia; ?></td>
                <td><?php echo $row->estadoCivil; ?></td>

                <td>        
                  <?php echo form_open_multipart('apoderado/habilitarbd'); ?>
                  <input type="hidden" name="idPersona" value="<?php echo $row->idPersona; ?>">
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
        <?php echo form_open_multipart('apoderado/index'); ?>
        <button type="submit" class="btn btn-primary" >Ver Padres Habilitados</button>
        <?php echo form_close(); ?>
        <br>
        </div>
    </div>
</div>