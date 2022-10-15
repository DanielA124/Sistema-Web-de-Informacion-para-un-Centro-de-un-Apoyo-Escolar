   
   <!-- Sidebar -->


        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                    <div class="sidebar-brand-text mx-3">Cruz del Sur</div>    
                <?php echo form_close(); ?>
                
            </a>            
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interfaz
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Personas</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ver:</h6>
                        <?php echo form_open_multipart('usuario/index'); ?>
                            <button type="submit" class="btn btn-light btn-block btn-sm">Usuarios</button>
                        <?php echo form_close(); ?>
                        <?php echo form_open_multipart('apoderado/index'); ?>
                            <button type="submit" class="btn btn-light btn-block btn-sm">Padres</button>
                        <?php echo form_close(); ?>
                        <?php echo form_open_multipart('estudiante/index'); ?>
                            <button type="submit" class="btn btn-light btn-block btn-sm">Estudiante</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Inscripción</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ver:</h6>
                        <?php echo form_open_multipart('inscripcion/index'); ?>
                            <button type="submit" class="btn btn-light btn-block btn-sm">Inscritos</button>
                        <?php echo form_close(); ?>
                        <?php echo form_open_multipart('pago/index'); ?>
                            <button type="submit" class="btn btn-light btn-block btn-sm">Pagos</button>
                        <?php echo form_close(); ?>
                        <?php echo form_open_multipart('mensualidad/index'); ?>
                            <button type="submit" class="btn btn-light btn-block btn-sm">Mensualidad</button>
                        <?php echo form_close(); ?>
                    </div>

                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Documentos
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Archivos</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ver:</h6>
                        <?php echo form_open_multipart('plantilla/index'); ?>
                            <button type="submit" class="btn btn-light btn-block btn-sm">Datos</button>
                        <?php echo form_close(); ?>
                        <?php echo form_open_multipart('archivo/index'); ?>
                            <button type="submit" class="btn btn-light btn-block btn-sm">Documentos</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>            

            <!-- Sidebar Message -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
  