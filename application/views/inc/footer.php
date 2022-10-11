
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>sbadmin2/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>sbadmin2/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>sbadmin2/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url(); ?>sbadmin2/js/demo/chart-pie-demo.js"></script>
    <script src="<?php echo base_url(); ?>sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>sbadmin2/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>sbadmin2/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>sbadmin2/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url(); ?>sbadmin2/js/demo/chart-pie-demo.js"></script>
    <script>
  $(function () {
   $('#dataTable').DataTable({      
      "fixedHeader": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
      "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, 'Todos'],
        ],
      
      //traduccion al español dataTable
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros de 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior",
        },
        "sProcessing": "Procesando...",
      }
    });    
  });
</script>

<script type="text/javascript">
    function mostrarPassword(){
        var cambio = document.getElementById("Password");
        if(cambio.type == "password"){
          cambio.type = "text";
          $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
          cambio.type = "password";
          $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
      } 
      
      $(document).ready(function () {
      //CheckBox mostrar contraseña
      $('#ShowPassword').click(function () {
        $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
      });
    });
</script>

    <script src="<?php echo base_url(); ?>sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>sbadmin2/js/demo/datatables-demo.js"></script>
</body>
</html>
