<?php
//Conexion a la Base de Datos
$db = conectarDB();

//Consulta
$consultaPropiedades = "SELECT * FROM propiedades LIMIT {$limite};";

//Consulta a la Base de Datos
$propiedades = mysqli_query($db, $consultaPropiedades);

?>

<div class="contenedor-anuncios">
    <?php
    while ($propiedad = mysqli_fetch_assoc($propiedades)) :
    ?>
        <div class="anuncio">

            <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio" />
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad["titulo"]; ?></h3>
                <p>
                    <?php echo substr($propiedad["descripcion"], 0, 140) . " ..."; ?>
                </p>
                <p class="precio">$<?php echo round($propiedad["precio"]); ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
                        <p><?php echo $propiedad["wc"]; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
                        <p><?php echo $propiedad["estacionamiento"]; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
                        <p><?php echo $propiedad["habitaciones"]; ?></p>
                    </li>
                </ul>
                <form action="anuncio.php" class="w-100" method="GET">
                    <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                    <input type="submit" class="boton-amarillo-block" value="Ver Propiedad">
                </form>
            </div>
            <!-- .contenido-anuncio -->
        </div>
    <?php
    endwhile;

    mysqli_close($db);
    ?>

</div>
<!-- .contenedor-anuncios -->