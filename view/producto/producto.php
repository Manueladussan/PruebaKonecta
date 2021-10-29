<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Prueba Konecta</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" type="text/css" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bower_components/datatables.net-select-bs/css/select.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bower_components/bootstrapvalidator/dist/css/bootstrapValidator.min.css">
        <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bower_components/datatables.net-buttons-dt/css/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="bower_components/datatables.net-buttons-dt/css/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bower_components/datatables.net-buttons-dt/css/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="bower_components/font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        
    <div class="container">
        <h1 class="page-header">Productos</h1>
        <table class="table table-bordered table-striped" id="products">
            <thead>
                <tr>
                    <th style="text-align:center;">Id</th>
                    <th style="text-align:center;">Nombre producto</th>
                    <th style="text-align:center;">Referencia</th>
                    <th style="text-align:center;">Precio</th>
                    <th style="text-align:center;">Peso</th>
                    <th style="text-align:center;">Categoría</th>
                    <th style="text-align:center;">Stock</th>
                    <th style="text-align:center;">Fecha creación</th>
                    <th style="text-align:center;">Fecha ultima venta</th>
                    <th style="text-align:center;" >Editar</th>
                    <th style="text-align:center;" >Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($this->model->Listar() as $r): ?>
                <tr>
                  <td style="text-align:center;"><?php echo $r->id ?></td> 
                  <td style="text-align:center;"><?php echo $r->nombre_producto ?></td> 
                  <td style="text-align:center;"><?php echo $r->referencia?></td>
                  <td style="text-align:center;"><?php echo $r->precio ?></td>
                  <td style="text-align:center;"><?php echo $r->peso ?></td>  
                  <td style="text-align:center;"><?php echo $r->categoria?></td>
                  <td style="text-align:center;"><?php echo $r->stock ?></td>
                  <td style="text-align:center;"><?php echo $r->fecha_de_creacion ?></td>
                  <?php
                    if ($r->fecha_ultima_venta == "") {
                      $r->fecha_ultima_venta = "No se hallaron ventas";
                    }
                  ?>
                  <td style="text-align:center;"><?php echo $r->fecha_ultima_venta ?></td>
                  <td>
                    <a class="edit"><i class="fa fa-edit"></i></a>
                  </td>
                    <td>
                        <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Producto&a=Eliminar&id=<?php echo $r->id; ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="modal-add-products">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Agregar nueva producto</h4>
          </div>
          <form  id="addProducts" action="?c=Producto&a=Crear" method="post">
          <div class="modal-body">  
              <div class="box-body">
                <div class="form-group">
                  <label class="control-label">Nombre producto</label>
                  <input type="text" class="form-control" id="Nombre_producto" name="Nombre_producto" placeholder="Nuevo producto" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Referencia</label>
                  <input type="text" class="form-control" id="Referencia" name="Referencia" placeholder="Referencia" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Precio</label>
                  <input type="text" class="form-control" id="Precio" name="Precio" placeholder="Precio" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Peso</label>
                  <input type="text" class="form-control" id="Peso" name="Peso" placeholder="Peso" required>
                </div> 
                <div class="form-group">
                  <label class="control-label">Categoría</label>
                  <input type="text" class="form-control" id="Categoria" name="Categoria" placeholder="Categoría" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Stock</label>
                  <input type="text" class="form-control" id="Stock" name="Stock" placeholder="Stock" required>
                </div>                    
              </div>
              <kalliope:csrf_input name="csrf">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Agregar producto</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal-edit-products">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editar producto</h4>
          </div>
          <form  id="editProducts" action="?c=Producto&a=Editar&id=<?php echo $r->id; ?>" method="post">
          <div class="modal-body">  
              <div class="box-body">
                <div class="form-group">
                  <label class="control-label">Nombre producto</label>
                  <input type="text" class="form-control" id="Nombre_producto_edit" name="Nombre_producto_edit" placeholder="Producto" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Referencia</label>
                  <input type="text" class="form-control" id="Referencia_edit" name="Referencia_edit" placeholder="Referencia" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Precio</label>
                  <input type="text" class="form-control" id="Precio_edit" name="Precio_edit" placeholder="Precio" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Peso</label>
                  <input type="text" class="form-control" id="Peso_edit" name="Peso_edit" placeholder="Peso" required>
                </div> 
                <div class="form-group">
                  <label class="control-label">Categoría</label>
                  <input type="text" class="form-control" id="Categoria_edit" name="Categoria_edit" placeholder="Categoría" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Stock</label>
                  <input type="text" class="form-control" id="Stock_edit" name="Stock_edit" placeholder="Stock" required>
                </div>                    
              </div>
              <kalliope:csrf_input name="csrf">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Editar producto</button>
          </div>
          </form>
        </div>
      </div>
      <script src="bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
      <script type="text/javascript" src="bower_components/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>
      <script type="text/javascript" src="bower_components/bootstrapvalidator/src/js/language/es_ES.js"></script>
      <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" src="bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="bower_components/datatables.net-buttons/js/buttons.colVis.min.js"></script>
      <script type="text/javascript" src="bower_components/datatables.net-select/js/dataTables.select.min.js"></script>
      <script type="text/javascript">
      var table = $('#products').DataTable({
      dom:'Bfrtip',       
      "scrollX": false,           
      "pageLength": 50,        
      buttons: [
        {
            text: '<i class= "fa fa-plus" ></i> Agregar producto',
            titleAttr: 'Agregar producto',
            action: function ( e, dt, node, config ) {
              $('#modal-add-products').modal('show');
            },
            enabled: true,
        },      
      ]       
      });

    $(document).ready(function() {
      $('#addProducts').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          }
      });

        $('#editProducts').bootstrapValidator({
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            }
        });


      $(".edit").each(function () {
        $(this).on("click", function(evt){
          $this = $(this);
          $('#modal-edit-products').modal('show');
          var dtRow = $this.parents("tr");
          $("#Nombre_producto_edit").val(dtRow[0].cells[1].innerHTML);
          $("#Referencia_edit").val(dtRow[0].cells[2].innerHTML);
          $("#Precio_edit").val(dtRow[0].cells[3].innerHTML);
          $("#Peso_edit").val(dtRow[0].cells[4].innerHTML);
          $("#Categoria_edit").val(dtRow[0].cells[5].innerHTML);
          $("#Stock_edit").val(dtRow[0].cells[6].innerHTML);                         
        });
      });
    });

    //$("#edit").on("click",function() {
      //$('#modal-edit-products').modal('show');
    //});



      </script>
    </div>
  </body>
</html>