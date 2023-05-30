<fieldset>
    <legend>Informacion General</legend>
    <label for="titulo">Titulo:</label>
    <input type="text" name="propiedad[titulo]" placeholder="Titulo Propiedad" id="titulo" value="<?php echo sanitizarHTML($propiedad->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" name="propiedad[precio]" placeholder="Precio Propiedad" id="precio" min="0" value="<?php echo sanitizarHTML($propiedad->precio); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" accept="image/jpeg , image/png" name="propiedad[imagen]">
    <?php
    if ($propiedad->imagen) {
    ?>
        <img src="./../../imagenes/<?php echo $propiedad->imagen; ?>" alt="<?php echo $propiedad->titulo; ?>" class="imagen-small">
    <?php
    }
    ?>


    <label for="descripcion">Descripcion:</label>
    <textarea name="propiedad[descripcion]" id="descripcion" cols="30" rows="10"> <?php echo sanitizarHTML($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Informacion de la Propiedad</legend>
    <label for="habitaciones">Habitaciones:</label>
    <input type="number" name="propiedad[habitaciones]" placeholder="Ej:3" id="habitaciones" min="1" max="9" value="<?php echo sanitizarHTML($propiedad->habitaciones); ?>">

    <label for="wc">Baños:</label>
    <input type="number" name="propiedad[wc]" placeholder="Ej:3" id="wc" min="1" max="9" value="<?php echo sanitizarHTML($propiedad->wc); ?>">
    <label for="estacionamiento">Estacionamientos:</label>
    <input type="number" name="propiedad[estacionamiento]" placeholder="Ej:3" id="estacionamiento" min="0" max="9" value="<?php echo sanitizarHTML($propiedad->estacionamiento); ?>">

</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <select name="propiedad[vendedores_id]" id="vendedor">
        <option value="1">--Seleccione--</option>

    </select>
</fieldset>