 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tiendas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Ubicacion</th>
                  <th>Fecha</th>
                  <th>Editar</th>
                  <th>Borrar</th>
                  <th>Tienda</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                $vistaUsuario = new Controller();
                $vistaUsuario -> vistaTiendaController();
                $vistaUsuario -> borrarTiendaController();
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
    <!-- /.content -->