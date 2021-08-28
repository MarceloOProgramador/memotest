<?php $v->layout("index"); ?>

<div>
  <div class="row">
    <div class="col-3">
      <label for="data_search" class="form-label">Nome do Produto</label>
      <input type="text" class="form-control" id="produto_nome"">
    </div>
    <div class="col-3">
      <label for="data_search" class="form-label">Valor Unitário</label>
      <input type="text" class="form-control" id="produto_valor_unitario">
    </div>
    <div class="col-3">
      <label for="data_search" class="form-label">Quantidade</label>
      <input type="text" class="form-control" id="produto_qnt">
    </div>
    <div class="col-3" >
      <button class="btn btn-success" id="btn_lancar" style="float: right">
        Lançar
      </button>
    </div>
  </div>
  <div class="row">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Produto</th>
          <th scope="col">Valor Unitário</th>
          <th scope="col">Quantidade</th>
          <th scope="col">total</th>
        </tr>
      </thead>

      <tbody id="table_rows">
      </tbody>

      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td id="total_venda"><p>0</p></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-3">
      <label for="data_search" class="form-label">Vendedor</label>
      <input type="text" class="form-control" id="vendedor"">
    </div>
    <div class="col-9">
      <button id="btn_salvar" class="btn btn-success" style="float: right">
        Salvar Venda
      </button>
    </div>
  </div>
</div>

<?php $v->push("scripts"); ?>

<script>
  var products = [];
  var total_venda = 0;
  $(document).ready(function(){
    $("#btn_lancar").click(function(){
      var product = {
        "nome" : $("#produto_nome").val(),
        "valor" : $("#produto_valor_unitario").val(),
        "quantidade": $("#produto_qnt").val()
      };

      total_venda += product.quantidade * product.valor;
      $("#total_venda").html("<p>"+total_venda+"</p>");

      products.push(product);
      $("#table_rows").append("<tr><th scope='row'>"+ product.nome +"</th><td>"+ product.valor+"</td><td>"+ product.quantidade +"</td><td>"+ product.quantidade * product.valor +"</td></tr>");  
    });

    $("#btn_salvar").click(function(){
      console.log(products);
      $.ajax({
        type:"POST",
        dataType: "json",
        data: {
          products : products,
          vendedor: $("#vendedor").val(),
          total: total_venda
        },
        url: "http://localhost/memocash/api/produtos",
        success: function (response){
          alert(response.success);
          location.replace("http://localhost/memocash/");
        }
      });  
    });
  });
</script>

<?php $v->end(); ?>