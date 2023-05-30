<?php
require("includes/app.php");
incluirTemplate("header");
?>


<main class="contenedor seccion contenido-centrado">
  <h1>Decoracion de tu hogar</h1>

  <picture>
    <source srcset="build/img/destacada2.webp" type="image/webp" />
    <source srcset="build/img/destacada2.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad" />
  </picture>

  <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

  <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque
    aspernatur impedit sapiente temporibus quisquam accusamus aperiam
    dolor error facilis suscipit ratione odit dicta numquam deserunt, a
    recusandae, eum ab accusantium? Lorem ipsum dolor sit amet consectetur
    adipisicing elit. Neque aspernatur impedit sapiente temporibus
    quisquam accusamus aperiam dolor error facilis suscipit ratione odit
    dicta numquam deserunt, a recusandae, eum ab accusantium?
  </p>
  <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit
    officiis quisquam possimus non necessitatibus omnis et rerum, modi
    enim vero quidem eligendi ipsum vel harum quo fugit? Libero, optio
    officia.
  </p>
  </div>
</main>

<?php
incluirTemplate("footer");
?>