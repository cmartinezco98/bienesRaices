<?php
//Importar APP
require("../../includes/app.php");

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

//Auntenticacion Usuario
estadoAuntenticado();

$propiedad = new Propiedad();

//Arreglo con mensaje de errores
$errores = Propiedad::getErrores();



//Ejecuta el codigo despues de que el usuario envia el formulario 
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $propiedad = new Propiedad($_POST["propiedad"]);

    //Si la carpeta ya existe no la vuelve a crear
    if (!is_dir(CARPETA_IMAGENES)) {
        mkdir(CARPETA_IMAGENES);
    }

    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        //Resize a la imagen subida a la memoria temporal del Server
        $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);

        //Generar nombre unico 
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        //Seteando Nombre imagen
        $propiedad->setImagen($nombreImagen);
    }

    $errores = $propiedad->validacionErrores();

    //Insertar en la base de datos
    if (empty($errores)) {

        //Guardar imagen
        $imagen->save(CARPETA_IMAGENES . "/" . $nombreImagen);

        //Guardar en la base de Datos
        $resultadoConsulta = $propiedad->guardar();

        if ($resultadoConsulta) {
            header("Location:/ProyectosPHP/bienesraices_inicio/admin/index.php?codigo=1");
        } else {
            header("Location:/ProyectosPHP/bienesraices_inicio/admin/index.php?codigo=3");
        }
    }
}

incluirTemplate("header");
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/ProyectosPHP/bienesraices_inicio/admin/index.php" class="boton-verde">Volver</a>
    <?php
    if (!empty($errores)) {
        foreach ($errores as $error) {   ?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>
    <?php }
    } ?>

    <form class="formulario" method="POST" action="/ProyectosPHP/bienesraices_inicio/admin/propiedades/crear.php" enctype="multipart/form-data">
        <?php
        include '../../includes/templates/formulario_propiedad.php';
        ?>

        <input type="submit" value="Crear Propiedad" class="boton-verde">
    </form>

</main>
<?php
incluirTemplate("footer");
?>