
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <h2>Actualizar Deuda</h2>

        <?php 
        foreach($infoPagoMen->result() as $row)
        {
        echo form_open_multipart('pagomes/modificarbd');?>
        <input type="hidden" name="idPagoMen" value="<?php echo $row->idPagoMen; ?>">
        <div class="row">
            <div class="col-md-12">
                 <?php
                    echo "El Cliente pago un total de: $row->pagado Bs. de los $row->total Bs. <br>";
                    echo "El Cliente tiene una deuda de: $row->deuda Bs. <br><br>";
                 ?>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-3">
                <label>Saldo a Pagar:</label>
            </div>
            <div class="col-md-2">
                <input type="hidden" name="pagado" value="<?php echo $row->pagado; ?>">
                <input type="hidden" name="total" value="<?php echo $row->total; ?>">
                <input type="number" name="saldoPagado" step="0.1" placeholder="" class="form-control" required value="" min="0" max="<?php echo $row->deuda; ?>"><br>     
            </div>
        </div>
        

        <button type="submit" class="btn btn-success">Actualizar Pendientes</button>
        <?php 
        echo form_close();
        }
        ?>
        </div>
    </div>
</div>