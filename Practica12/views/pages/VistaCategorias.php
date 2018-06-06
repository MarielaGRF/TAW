  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ver Categorias</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Table With Full Features</h3>
            </div>
            <!-- /.card-header -->
            <div class="row">
              <div class="col-sm-12 col-md-6">
                  <div id="example1_filter " class="dataTables_filter" class="form-group">
                    <label>Search:
                      <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1">
                    </label>
                  </div>
                </div>
              </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Fecha</th>
                  <th>Editar</th>
                  <th>Borrar</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                $vistaUsuario = new Controller();
                $vistaUsuario -> vistaCategoriaController();
                $vistaUsuario -> borrarCategoriaController();
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>





