<?php
require("includes/app.php");
incluirTemplate("header", $inicio = true);
?>

<main class="contenedor seccion">
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
      <h3>Dinero</h3>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur
        non cumque et nihil debitis unde? Quia vitae hic illum laborum
        provident enim nihil consectetur, illo maxime ex aliquid eum
        officiis.
      </p>
    </div>

    <div class="icono">
      <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy" />
      <h3>Tiempo</h3>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur
        non cumque et nihil debitis unde? Quia vitae hic illum laborum
        provident enim nihil consectetur, illo maxime ex aliquid eum
        officiis.
      </p>
    </div>
  </div>
</main>

<section class="contenedor seccion">
  <h2>Casas y Depas en Venta</h2>

  <?php
  $limite = 3;
  include("includes/templates/anuncios.php");
  ?>
  <div class="alinear-derecha">
    <a href="anuncios.php" class="boton-verde">Ver Todas</a>
  </div>
</section>

<section class="imagen-contacto">
  <h2>Encuentra la casa de tus sueños</h2>
  <p>
    Llena el formulario de contacto y un asesor se pondrá en contacto
    contigo
  </p>
  <a href="contacto.php" class="boton-amarillo">Contactános</a>
</section>

<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro Blog</h3>
    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog1.webp" type="image/webp" />
          <source srcset="build/img/blog1.jpg" type="image/jpeg" />
          <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog" />
        </picture>
      </div>
      <div class="texto-entrada">
        <a href="entrada.html">
          <h4>Terraza en el techo de tu casa</h4>
        </a>
        <p class="informacion-meta">
          Escrito el: <span>20/10/2021</span> por: <span>Admin</span>
        </p>
        <p>
          Consejos para construir una terraza en el techo con los mejores
          materiales y ahorrando dinero
        </p>
      </div>
    </article>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog2.webp" type="image/webp" />
          <source srcset="build/img/blog2.jpg" type="image/jpeg" />
          <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada blog" />
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.html">
          <h4>Guía para la decoración de tu hogar</h4>
        </a>
        <p class="informacion-meta">
          Escrito el: <span>20/10/2021</span> por: <span>Admin</span>
        </p>
        <p>
          Maximiza el espacio de tu hogar con esta guía, aprende a combinar
          muebles y colores para darle vida a tu espacio
        </p>
      </div>
    </article>
  </section>

  <section class="testimoniales">
    <h3>Testimoniales</h3>
    <div class="testimonial">
      <blockquote>
        El personal se comporto de una excelente forma, muy buena atención y
        la casa que me ofrecieron cumple todas mis expectativas.
      </blockquote>
      <p>- Santiago Martínez</p>
    </div>
  </section>
</div>

<?php
incluirTemplate("footer");
?>