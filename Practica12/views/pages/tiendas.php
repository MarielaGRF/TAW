    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Nueva tienda</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" class="form-control" id="Nombre"  name="nombre" required>
                  </div>
                  <div class="form-group">
                    <label for="Descripcion">Direccion</label>
                    <input type="text" class="form-control"  name="direccion"  required>
                  </div>
                  
                  <!-- /.card-body -->

                  
                <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
              </form>
            </div>
            <!-- /.card -->
           
       </div>
     </div>
   </div>
   </section>
   <?php
$registro = new Controller();
$registro -> registroTiendaController();
?>