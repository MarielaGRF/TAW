    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Editar Categoria</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  method="post">
                <div class="card-body">
                 <?php

                  $editarUsuario = new Controller();
                  $editarUsuario -> editarCategoriaController();
                  $editarUsuario -> actualizarCategoriaController();

                  ?>
                </div>
              </form>
            </div>
            <!-- /.card -->
           
       </div>
     </div>
   </div>
   </section>
