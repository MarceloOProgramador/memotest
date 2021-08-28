<?php $v->layout("index"); ?>

<div>
  <div class="row">
    <!--div class="col-3">
      <label for="data_search" class="form-label">Data</label>
      <input type="text" class="form-control" id="data_search" placeholder="Ex: 2021-01-01">
    </div-->
    <div class="col-3">
      <label for="vendedor" class="form-label">Vendedor</label>
      <input id="vendedor_search" type="text" class="form-control" id="vendedor">
    </div>
    <div class="col-6">
        <button id="btn-search" class="btn btn-success">
          Buscar
        </button>
    </div>
  </div>
  
  <div class="col-12">
    <table class="table" id="table_venda">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Data - Hora</th>
          <th scope="col">Vendedor</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody id="rows_table">
      </tbody>
    </table>
  </div>

  <div class="row">
    <div class="col-12">
      <a href="http://localhost/memocash/vendas" class="btn btn-primary" style="float: right">
        Nova BatVenda
      </a>
    </div>    
  </div>
</div>

<?php $v->push("scripts");?>
  <script>
    $(document).ready(function(){
      $.ajax({
        type:"GET",
        dataType: "json",
        url: "http://localhost/memocash/api/vendas",
        success: function (datas){
          datas.forEach((data) => {
            $("#rows_table").append("<tr>"+
            "<th scope='row'>"+ data.id +"</th>"+
            "<td>"+ data.data + " - " + data.hora +"</td>"+
            "<td>"+ data.vendedor +"</td>"+
            "<td>"+ data.total +"</td></tr>"
            );
          })
        }
      });
      
      $("#btn-search").click(function(){
        var rows = "";
        var search = $("#vendedor_search").val();
        $.ajax({
          type:"GET",
          dataType: "json",
          url: "http://localhost/memocash/api/vendas/"+ search,
          success: function (datas){
            datas.forEach((data) => {
              rows += "<tr>"+
              "<th scope='row'>"+ data.id +"</th>"+
              "<td>"+ data.data + " - " + data.hora +"</td>"+
              "<td>"+ data.vendedor +"</td>"+
              "<td>"+ data.total +"</td></tr>";
            });
            $("#rows_table").html(rows);
          }
        });
      
      })
    });
  </script>
<?php $v->end();?>
