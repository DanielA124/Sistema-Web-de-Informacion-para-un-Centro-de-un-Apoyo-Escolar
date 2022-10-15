<div class="container">
    <div class="row">
        <div class="col-md-12">

        <?php 
        echo form_open_multipart('pago/agregarbd');
        ?>
        <div class="row">
            <div class="col-md-3">
                <label>Total:</label>
            </div>
            <div class="col-md-9">
                <input type="double" name="total" placeholder="" class="form-control" required><br>     
            </div>
        </div>
        
        <br>
        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"> </i> Agregar Datos Pago</button>
       
        <?php 
        echo form_close();
        ?>      
        </div>
    </div>
</div>