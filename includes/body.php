<div class="encabezado text-center">	
  <h1>2ºDAW Semi - López Salado, José </h1>
</div>

<div class="centrar">	
  <div class="container cuerpo text-center">
    <p><h2><img class="alineadoTextoImagen" src="images//firma.png" width="50px"/>INTRODUCCIÓN DE DATOS EXPEDIENTES</h2></p>
    <?php echo validez($errors); ?>
    <?php if (isset($_POST["submit"]) && (count($errors) > 0)) { echo novalido($errors); } ?>
  </div>
  <div class="container">
    <form enctype="multipart/form-data" method="POST" action="formulario.php">

      <label for="expediente">Número de Expediente:
        <input type="text" name="expediente" class="form-control" <?php if(isset($_POST["expediente"])){echo "value='{$_POST["expediente"]}'";} ?> required />
        <?php echo mostrar_error($errors, "expediente"); ?>    
      </label>
      <br/>

      <label for="nif"> NIF:
        <input type="text" name="nif" class="form-control" <?php if(isset($_POST["nif"])){echo "value='{$_POST["nif"]}'";} ?> required />
        <?php echo mostrar_error($errors, "nif"); ?>
      </label>
      <br/>

      <label for="apellidos">Apellidos:
        <input type="text" name="apellidos" class="form-control" <?php if(isset($_POST["apellidos"])){echo "value='{$_POST["apellidos"]}'";} ?> required />
        <?php echo mostrar_error($errors, "apellidos"); ?>
      </label>
      <br/>

      <label for="nombre">Nombre:
        <input type="text" name="nombre" class="form-control" <?php if(isset($_POST["nombre"])){echo "value='{$_POST["nombre"]}'";} ?> required />
        <?php echo mostrar_error($errors, "nombre"); ?>                      
      </label>
      <br/>

      <label for="sexo">Sexo:
        <select name="sexo" class="form-control">
          <option value="H" <?php if(isset($_POST["sexo"])){ if($_POST["sexo"]=="H"){ echo "selected='selected'"; }} ?> >Hombre</option>
          <option value="M" <?php if(isset($_POST["sexo"])){ if($_POST["sexo"]=="M"){ echo "selected='selected'"; }} ?> >Mujer</option>
        </select>
        <?php echo mostrar_error($errors, "sexo"); ?>                         
      </label>
      <br/>

      <label for="email">Corre electrónico:
        <input type="email" name="email" class="form-control" <?php if(isset($_POST["email"])){echo "value='{$_POST["email"]}'";} ?> required />
        <?php echo mostrar_error($errors, "email"); ?>                       
      </label>
      <br/>

      <label for="telefono">Teléfono móvil:
        <input type="tel" name="telefono" class="form-control" <?php if(isset($_POST["telefono"])){echo "value='{$_POST["telefono"]}'";} ?> required />
        <?php echo mostrar_error($errors, "telefono"); ?>                    
      </label>
      <br/> 
      
      <label for="imagen">Imagen:
        <input type="file" name="imagen" class="form-control" />
        <?php echo mostrar_error($errors, "imagen"); ?>                    
      </label>
      <br/>

      <label for="beca">Solicitar beca:
        <input type="checkbox" name="beca" <?php if(isset($_POST["beca"]) && $_POST["beca"]=="on"){ echo "checked='checked'"; } ?> />
        <?php echo mostrar_error($errors, "beca"); ?>                    
      </label>
      <br/>

      <input type="submit" value="Registrar" name="submit" class="btn btn-success" />
    </form>
  </div>
</div>