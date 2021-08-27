<?php $v->layout("index"); ?>

<div>
  <div class="row">
    <div class="col-3">
      <label for="data_search" class="form-label">Data</label>
      <input type="text" class="form-control" id="data_search" placeholder="Ex: 2021-01-01">
    </div>
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

    <div class="col-3">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
      </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label for="vendedor_name" class="form-label">Vendedor</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="vendedor_name" aria-describedby="basic-addon3">
            </div>
            <label for="total_input" class="form-label">Total</label>
            <div class="input-group mb-3">
              <input type="number" class="form-control" id="total_input" aria-describedby="basic-addon3">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button id="btn-salvar_vendedor" type="button" class="btn btn-primary">Salvar</button>
          </div>
        </div>
      </div>
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
            $("#rows_table").append("<tr>");
            $("#rows_table").append("<th scope='row'>"+ data.id +"</th>");
            $("#rows_table").append("<td>"+ data.data + " - " + data.hora +"</td>");
            $("#rows_table").append("<td>"+ data.vendedor +"</td>");
            $("#rows_table").append("<td>"+ data.total +"</td>");
            $("#rows_table").append("</tr>");
          })
        }
      });
      $("#btn-salvar_vendedor").click(function(){
        var datas = {
          "vendedor" : $("#vendedor_name").val(),
          "total" : $("#total_input").val()
        };
        $.ajax({
          type:"POST",
          dataType: "json",
          data: datas,
          url: "http://localhost/memocash/api/vendas",
          success: function (response){
            alert(response.success);
            history.go(0);
          }
        });
      });      
      $("#btn-search").click(function(){
        var value;

        if($("#data_search").val() != ""){
          value = $("#data_search").val();
          $("#rows_table tr").filter(function(){
            console.log($(this).text().toLowerCase().indexOf(value));
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
          })
        }else if($("$vendedor_search" != "")){
          value = $("#data_search").val();
          $("#rows_table tr").filter(function(){
            console.log($(this).text().toLowerCase().indexOf(value));
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
          })
        }
      })
    });
  </script>
<?php $v->end();?>
