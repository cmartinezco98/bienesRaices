<?php

require("../includes/app.php");
debuguear(phpinfo());

use App\Propiedad;


//Autenticar usuario

estadoAuntenticado();

//Variabe Get con codigo de resultado al crear una propiedad
$resultadoPropiedadCreada = $_GET["codigo"] ?? null;

$propiedades = Propiedad::getAll();

//Eliminar Propiedad de la base de Datos
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    // $_POST = [];
    //debuguear("id: {$id} ", $id == true);
    // debuguear($id);
    if ($id) {
        $propiedad = Propiedad::getForID($id);
        var_dump($propiedad);
        $propiedad->eliminar();
    } else {
        header("Location:/ProyectosPHP/bienesraices_inicio/admin/index.php?codigo=3");
    }
}


incluirTemplate("header");
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php if ($resultadoPropiedadCreada == 1) : ?>

        <p class="alerta exito"> <?php echo "Propiedad Creada Correctamente"  ?> </p>

    <?php endif ?>

    <?php if ($resultadoPropiedadCreada == 2) : ?>

        <p class="alerta exito"> <?php echo "Propiedad Actualizada Correctamente"  ?> </p>

    <?php endif ?>

    <?php if ($resultadoPropiedadCreada == 3) : ?>

        <p class="alerta error"> <?php echo "Error en Paso de Parametros"  ?> </p>

    <?php endif ?>
    <?php if ($resultadoPropiedadCreada == 4) : ?>

        <p class="alerta eliminar"> <?php echo "Propiedad Eliminada Correctamente"  ?> </p>

    <?php endif ?>

    <a href="/ProyectosPHP/bienesraices_inicio/admin/propiedades/crear.php" class="boton-verde">Crear nueva propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propiedades as $propiedad) : ?>
                <tr>
                    <td><?php echo $propiedad->id ?></td>
                    <td><?php echo $propiedad->titulo ?></td>
                    <td><img src="/ProyectosPHP/bienesraices_inicio/imagenes/<?php echo $propiedad->imagen ?>" class="iamgen-tabla" alt="<?php echo $propiedad->titulo ?>"></td>
                    <td>$<?php echo $propiedad->precio ?></td>
                    <td>
                        <form class="w-100 delete-form" method="POST">
                            <input type="hidden" id="id" name="id" value="<?php echo $propiedad->id ?>">
                            <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>

                        <a href="./propiedades/actualizar.php?idPropiedad=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</main>



<?php

//Cerrar la conexion 
mysqli_close($db);


incluirTemplate("footer");
?>