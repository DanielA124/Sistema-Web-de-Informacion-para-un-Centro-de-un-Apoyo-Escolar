<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <h2>Se realizo la Insercion con Exito</h2>
      <div class="row">
        <div class="col-md-2">
          <?php echo form_open_multipart('pagomes/index'); ?>
           <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-chevron-left"></i>  Volver a Inicio</button>
           <?php echo form_close(); ?>
          
        </div>
        <div class="col-md-2">
           <?php echo form_open_multipart('pagomes/reportepdf'); ?>
            <?php $pagoID=$this->db->query("SELECT MAX(idPagoMen) AS Pago 
                                            FROM pagomensualidad");
                foreach ($pagoID->result() as $rowPago)
                {
                ?>
                    <input type="hidden" name="idPagoMen" value="<?php echo $rowPago->Pago;?>">
                    <button type="submit" class="btn btn-success btn-block" formtarget="_blank" ><i class="fa fa-file-pdf"></i>   Factura</button>
                <?php
                }
            ?>
          <?php echo form_close(); ?>  
        </div>
      </div>      
    </div>
  </div>
</div>
