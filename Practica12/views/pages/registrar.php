<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Registrar Usuario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              
      <form  method="post">
        <div class="card-body">
          <div class="form-group">
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
              <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
              <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="email" class="form-control" placeholder="Email" name="email" required>
              <span class="fa fa-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" name="password" required>
              <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
              </div>
              <!-- /.col -->
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
          <!-- /.card -->
        
 </div>
</div>
</section>
<?php
$registro = new Controller();
$registro -> registroUsuarioController();


if(isset($_GET["action"])){

  if($_GET["action"] == "ok"){

    echo "<script>alert(Registro Exitoso)</script>";
  
  }else{
    echo "<script>alert(No Se Registrar)</script>";
  }

}
?>

