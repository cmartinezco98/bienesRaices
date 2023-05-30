<?php
require("includes/app.php");
incluirTemplate("header");
?>



<main class="contenedor seccion">
  <h1>Conoce sobre nosotros</h1>

  <section class="contenido-nosotros">
    <div class="imagen-nosotros">
      <picture>
        <source srcset="build/img/nosotros.webp" type="image/webp" />
        <source srcset="build/img/nosotros.jpg" type="image/jpeg" />
        <img loading="lazy" src="build/img/nosotros.jpg" alt="nosotros" />
      </picture>
    </div>

    <div class="entrada-nosotros">
      <h3>25 años de experencia</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque
        aspernatur impedit sapiente temporibus quisquam accusamus aperiam
        dolor error facilis suscipit ratione odit dicta numquam deserunt, a
        recusandae, eum ab accusantium? Lorem ipsum dolor sit amet
        consectetur adipisicing elit. Neque aspernatur impedit sapiente
        temporibus quisquam accusamus aperiam dolor error facilis suscipit
        ratione odit dicta numquam deserunt, a recusandae, eum ab
        accusantium?
      </p>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit
        officiis quisquam possimus non necessitatibus omnis et rerum, modi
        enim vero quidem eligendi ipsum vel harum quo fugit? Libero, optio
        officia.
      </p>
    </div>
  </section>
</main>

<section class="contenedor seccion">
  <h1>Mas Sobre Nosotros</h1>
  <div class="iconos-nosotros">
    <div class="icono">
      <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur
        non cumque et nihil debitis unde? Quia vitae hic illum laborum
        provident enim nihil consectetur, illo maxime ex aliquid eum
        officiis.
      </p>
    </div>

    <div class="icono">
      <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur
        non cumque et nihil debitis unde? Quia vitae hic illum laborum
        provident enim nihil consectetur, illo maxime ex aliquid eum
        officiis.
      </p>
    </div>

    <div class="icono">
      <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur
        non cumque et nihil debitis unde? Quia vitae hic illum laborum
        provident enim nihil consectetur, illo maxime ex aliquid eum
        officiis.
      </p>
    </div>
  </div>
</section>

<?php
incluirTemplate("footer");
?>