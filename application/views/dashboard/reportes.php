<div class="card shadow">
  <div class="card-body">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 col-sm-6  ">
          <div class="x_panel">
            <div class="x_title">
                <h2>Bar Charts <small>Sessions</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <input type="button" id="btnBuscar" value="Ver" class="btn btn-success btn-block">
              <canvas id="myChart" width="300" height="200"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var grafico= ['pie', 'bar', 'polarArea', 'line', 'doughnut'];
  var random = Math.floor(Math.random() * grafico.length);

  var paraMes=[];
  var paraNumero=[];

$("#btnBuscar").click(function(){
  $.post("<?php echo base_url();?>index.php/Dashboard/getMeses",
    function(data){
      var obj= JSON.parse(data);

      $.each(obj, function(i,item){
        paraMes.push(item.Mes);
        paraNumero.push(item.Num);
      });

      //var paraColor = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
       // var paraNum = [12, 19, 3, 5, 2, 3];
      
        var ctx = $("#myChart");
          var myChart = new Chart(ctx, {
              type: grafico[random],
              data: {
                  labels: paraMes, //paraColor,
                  datasets: [{
                      label: paraMes,
                      data: paraNumero, //paraNum ,
                      backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                      ],
                      borderColor: [
                          'rgba(255, 99, 132, 1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)'
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      y: {
                          beginAtZero: true
                      }
                  }
              }
        });
      });
});

  
</script>