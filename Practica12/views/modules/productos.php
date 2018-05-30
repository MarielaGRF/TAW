<h5>REGISTRO DE PRODUCTOS</h5>

<form method="post">
	
	<input type="text" placeholder="Product" name="productName" required>
	<input type="number" placeholder="Cantidad" name="cantidad" required>
	<label>Proveedor</label>
	<select name="proveedor" class="browser-default" >
		<option value="1"> Proveedor1</option>
		<option value="2">Proveedor2</option>
	</select>
	<label>Categoria</label>
	<select name="categoria" class="browser-default">
		<option value="1">Categoria1</option>
		<option value="2">Categoria2</option>
	</select>
		<textarea type="text" placeholder="Description" name="descripcion" rows="8" cols="55" required></textarea>

	<input type="submit" value="Enviar">

</form>

