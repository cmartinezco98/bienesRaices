<?php
require("includes/app.php");

$idPropiedad = $_GET['id'];

$idPropiedad = filter_var($idPropiedad, FILTER_VALIDATE_INT);

if (!$idPropiedad) {
  header("location:/ProyectosPHP/bienesraices_inicio/index.php");
}

//Conexion a la Base de Datos
$db = conectarDB();

//Consulta
$consultaPropiedad = "SELECT * FROM propiedades WHERE id={$idPropiedad};";


//Consulta a la Base de Datos
$propiedad = mysqli_query($db, $consultaPropiedad);

if (!$propiedad->num_rows) {
  header("Location:/ProyectosPHP/bienesraices_inicio/index.php");
}

$propiedad = mysqli_fetch_assoc($propiedad);



incluirTemplate("header");
?>


<main class="contenedor seccion contenido-centrado">
  <h1> <?php echo $propiedad['titulo']; ?></h1>

  <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen'] ?>" alt="imagen de la propiedad" />

  <div class="resumen-propiedad">
    <p class="precio">$ <?php echo round($propiedad['precio'], 0); ?></p>
    <ul class="iconos-caracteristicas">
      <li>
        <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
        <p> <?php echo $propiedad['wc']; ?></p>
      </li>
      <li>
        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
        <p> <?php echo $propiedad['estacionamiento']; ?></p>
      </li>
      <li>
        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
        <p> <?php echo $propiedad['habitaciones']; ?></p>
      </li>
    </ul>

    <p>
      <?php echo $propiedad['descripcion']; ?>
    </p>
  </div>
</main>

<?php
incluirTemplate("footer");
?>