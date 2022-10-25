
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <h2>Modificar Datos</h2>

        <?php 
        foreach($infoPago->result() as $row)
        {
        echo form_open_multipart('pago/modificarbd');?>
        <input type="hidden" name="idPago" value="<?php echo $row->idPago; ?>">
        <div class="row">
            <div class="col-md-3">
                <label>Total:</label>
            </div>
            <div class="col-md-9">
                <input type="double" name="total" placeholder="" class="form-control" required value="<?php echo $row->total; ?>"><br>     
            </div>
        </div>
        

        <button type="submit" class="btn btn-success">Modificar Datos</button>
        <?php 
        echo form_close();
        }
        ?>          
        </div>
    </div>
</div>