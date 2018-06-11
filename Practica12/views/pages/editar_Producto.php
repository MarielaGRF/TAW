<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="Views/dist/img/stock.png"
                       alt="User profile picture">
                </div>

                <?php
                  $vistaUsuario = new Controller();
                  $vistaUsuario -> vistaInfoController();
                ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Editar</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Borrar</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Nueva Producto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="post" role="form">
                <div class="card-body">
                  <?php
                  $editar = new Controller();
                  $editar -> editarProductoController();
                  $editar -> actualizarProductoController();
                  ?>
                  </div>
              </form>
            </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <?php

                  $borrar = new Controller();
                  $borrar -> vistaConfirmacionController();
                  $borrar -> borrarProductoController();
                  ?>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>