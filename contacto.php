<?php
require("includes/app.php");
incluirTemplate("header");
?>


<main class="contenedor seccion">
  <h1>Contacto</h1>
  <picture>
    <source srcset="build/img/destacada3.webp" type="image/webp" />
    <source srcset="build/img/destacada3.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/img/destacada3.jpg" alt="imagen formulario contacto" />
  </picture>

  <h2>Llene el formulario de Contacto</h2>
  <form action="" class="formulario">
    <fieldset>
      <legend>Informacion Personal</legend>
      <label for="nombre">Nombre</label>
      <input type="text" placeholder="Tu nombre" id="nombre" />
      <label for="email">Email</label>
      <input type="email" placeholder="Tu E-mail" id="email" />
      <label for="telefono">Telefono</label>
      <input type="tel" placeholder="Tu Telefono" id="telefono" />
      <label for="mensaje">Mensaje</label>
      <textarea type="text-area" placeholder="Mensaje" id="mensaje" cols="30" rows="10"></textarea>
    </fieldset>

    <fieldset>
      <legend>Informacion sobre la propiedad</legend>
      <label for="opciones">Vende o Compra</label>

      <select id="opciones">
        <option value="" disabled selected>--Selecione--</option>
        <option value="compra">Compra</option>
        <option value="vende">Vende</option>
        <label for="presupuesto">Presupuesto</label>
        <input type="number" placeholder="$" id="presupuesto" />
      </select>
    </fieldset>

    <fieldset>
      <legend>Contacto</legend>
      <p>Como desea ser contactado</p>
      <div class="forma-contacto">
        <label for="contacto-telefono">Telefono</label>
        <input name="contacto" type="radio" value="telefono" id="contacto-telefono" />
        <label for="contacto-email">E-mail</label>
        <input name="contacto" type="radio" value="email" id="contacto-email" />
      </div>
      <p>
        Si eligio telefono, elija la fecha y la hora para ser contactado
      </p>

      <label for="fecha">Fecha:</label>
      <input type="date" id="fecha" />

      <label for="hora">Hora:</label>
      <input type="time" id="hora" min="09:00" max="16:00" />
    </fieldset>
    <input type="submit" value="Enviar" class="boton-verde" />
  </form>
</main>

<?php
incluirTemplate("footer");
?>