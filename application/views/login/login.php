<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block">
              <img src="<?php echo base_url(); ?>img/CruzdelSur.png" width="500" height="430">
            </div>
                <div class="col-lg-6">
                  <div class="p-5">
                      <div class="text-center">
                        <h1 class="h3 text-gray-900 mb-4">Centro Integral de Aprendizaje</h1>
                      </div>
                        <?php
                                echo form_open_multipart('login/validar', array('id'=>'form1','class'=>'user'));
                            ?>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nombre de Usuario:</label>
                                <input type="text" class="form-control" name="nombreUsuario" placeholder="Ingrese su Nombre de Usuario" required>
                            </div>
                            <div class="col-md-12 mb-3">
                               <label class="form-label">Password:</label><br>
                              <div class="input-group">
                               <input ID="Password" type="password" class="form-control" name="password" placeholder="Ingrese su Password" required>
                               <div class="input-group-append">
                               <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                               </div>
                              </div>
                            </div>
                      <button class="w-100 btn btn-primary" type="submit">Ingresar</button>
                        <?php
                           echo form_close();
                        ?>
                        <hr>
                  <div class="text-center">
                      <a class="small" href="register.html">Crear una Cuenta</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>