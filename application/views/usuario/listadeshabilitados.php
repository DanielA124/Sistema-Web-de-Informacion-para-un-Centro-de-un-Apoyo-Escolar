<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">

        <h1>Lista de Usuarios Deshabilitados</h1>
<table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">
  <thead class="bg-info text-dark">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">Nombres</th>
        <th scope="col">Ap. Paterno</th>
        <th scope="col">Ap. Materno</th>
        <th scope="col">Dirección</th>
        <th scope="col">Creado</th>
        <th scope="col">Modificado</th>
        <th scope="col">Habilitar</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $indice=1;
    foreach ($usuario->result() as $row)
    {
        ?>

        <tr>
                <th scope="row"><?php echo $row->idUsuario; ?></th>
                <td><?php echo $row->nombres; ?></td>
                <td><?php echo $row->apellidoPaterno; ?></td>
                <td><?php echo $row->apellidoMaterno; ?></td>
                <td><?php echo $row->direccion; ?></td>
                <td><?php echo $row->fechaReg; ?></td>
                <td><?php echo $row->fechaAct; ?></td>
                <td align="center">        
                  <?php echo form_open_multipart('persona/habilitarbd'); ?>
                  <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
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
        <?php echo form_open_multipart('persona/index'); ?>
        <button type="submit" class="btn btn-primary" >Ver Usuarios Habilitados</button>
        <?php echo form_close(); ?>
        <br>
        </div>
    </div>
</div>