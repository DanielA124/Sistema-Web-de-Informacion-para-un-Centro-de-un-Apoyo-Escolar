<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">

        <h1>Lista de Archivos Deshabilitados</h1>
<table id="dataTable" class="table table-bordered table-responsive" width="100%" cellspacing="0">
  <thead class="bg-info text-dark">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">Nombre</th>
        <th scope="col">Creado</th>
        <th scope="col">Modificado</th>
        <th scope="col">Nombre Materia</th>
        <th scope="col">Habilitar</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $indice=1;
    foreach ($plantilla->result() as $row)
    {
        ?>

        <th scope="row"><?php echo $row->idPlantilla; ?></th>
                <td><?php echo $row->nombre; ?></td>
                <td><?php echo $row->fechaReg; ?></td>
                <td><?php echo $row->fechaAct; ?></td>
                <td><?php echo $row->nombreMateria; ?></td>
                <td>                
                  <?php echo form_open_multipart('plantilla/habilitarbd'); ?>
                  <input type="hidden" name="idPlantilla" value="<?php echo $row->idPlantilla; ?>">
                  <button type="submit" class="btn btn-success" text-align="text-center"><i class="fas fa-check"></i></button>
                  <?php echo form_close(); ?>
                </td>
        <?php
        $indice++;
        
    }
    ?>

  </tbody>
</table>
      <div class="row">
            <div class="col-md-12">
                <?php echo form_open_multipart('plantilla/index'); ?>
        <button type="submit" class="btn btn-primary btn-block" >Ver Archivos Habilitados</button>
        <?php echo form_close(); ?>
            </div>
      </div>
    </div>
  </div>
</div>