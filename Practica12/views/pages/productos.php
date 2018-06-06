
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Nueva Producto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="post" role="form">
              	<div class="card-body">
                  <?php
                  $registro = new Controller();
                  $registro -> FormProductosController();
                  $registro -> registroProductoController();
                  ?>
                  </div>
              </form>
            </div>
            <!-- /.card -->
           
       </div>
   </section>
