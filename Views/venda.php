<?php $v->layout("index"); ?>

<div>
  <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Data - Hora</th>
          <th scope="col">Vendedor</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <th scope="row">Id</th>
            <td>Vendedor</td>
            <td>Data - Hora</td>
            <td>Total</td>
          </tr>
      </tbody>
    </table>
</div>

<?php $v->push("scripts");?>
  <script>
    $(document).ready(function(){
      $.ajax({
        type:"GET",
        dataType: "json",
        url: "http://localhost/memocash/api/vendas",
        success: function (data){
          console.log("teste")
        }
      })
    });
  </script>
<?php $v->end();?>
