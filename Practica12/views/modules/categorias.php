<h5>REGISTRO DE CATEGORIAS</h5>
 <div class="row">
   <div class="col s12">
     <ul class="tabs">
       <li class="tab col s3"><a class="active" href="#test1">Categoria</a></li>
       <li class="tab col s3"><a href="#test2">Sub-Categorias</a></li>
     </ul>
   </div>
  <div id="test1" class="col s12">
	<form method="post">
		
		<input type="text" placeholder="Nombre" name="nombre" required>
		<textarea type="text" placeholder="Description" name="descripcion" rows="8" cols="55" required></textarea>
		<input type="submit" value="Enviar">
	</form>
</div>

<div id="test2" class="col s12">
	<form method="post">
		
		<input type="text" placeholder="Nombre" name="nombre" required>
		<label>Categoria</label>
		<select name="categoria" class="browser-default">
			<option value="1">Categoria1</option>
			<option value="2">Categoria2</option>
		</select>
		<textarea type="text" placeholder="Description" name="descripcion" rows="8" cols="55" required></textarea>
		<input type="submit" value="Enviar">
	</form>
</div>
</div>

<script src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

