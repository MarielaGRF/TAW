    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Nueva Categoria</h3>
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
                    <label for="Descripcion">Descripcion</label>
                    <input type="text" class="form-control"  name="descripcion"  required>
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
$registro -> registroCategoriaController();


if(isset($_GET["action"])){

  if($_GET["action"] == "ok"){

    echo "<script>alert(Registro Exitoso)</script>";
  
  }else{
    echo "<script>alert(No Se Registrar)</script>";
  }

}