<?php
//requires
require("../../includes/app.php");

//Use
use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

//Auntenticacion Usuario
estadoAuntenticado();

//Variable super global GET 
$idPropiedad = filter_var($_GET['idPropiedad'], FILTER_VALIDATE_INT);
$propiedad = Propiedad::getForID($idPropiedad);

//Ejecuta el codigo despues de que el usuario envia el formulario 
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //Asignar valores al arreglo de argumentos para actulizar el objeto en memoria
    $args = $_POST['propiedad'];
    $propiedad->sincronizar($args);

    //Si la carpeta ya existe no la vuelve a crear
    if (!is_dir(CARPETA_IMAGENES)) {
        mkdir(CARPETA_IMAGENES);
    }

    //Generar nombre unico 
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    //Insertar  Imagen en la base de datos
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        //Resize a la imagen subida a la memoria temporal del Server
        $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        //Seteando Nombre imagen
        $propiedad->setImagen($nombreImagen);
    }

    $errores = $propiedad->validacionErrores();

    //Insertar en la base de datos
    if (empty($errores)) {

        if (isset($imagen)) {
            //Guardar imagen
            $imagen->save(CARPETA_IMAGENES . "/" . $nombreImagen);
        }

        //Guardar en la base de Datos
        $resultadoConsulta = $propiedad->guardar();
        // debuguear($resultadoConsulta);
        if ($resultadoConsulta) {
            header("Location:/ProyectosPHP/bienesraices_inicio/admin/index.php?codigo=2");
        } else {
            header("Location:/ProyectosPHP/bienesraices_inicio/admin/index.php?codigo=3");
        }
    }
}


incluirTemplate("header");
?>
<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>
    <a href="/ProyectosPHP/bienesraices_inicio/admin/index.php" class="boton-verde">Volver</a>
    <?php
    if (!empty($errores)) {
        foreach ($errores as $error) {   ?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>
    <?php }
    } ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include('../../includes/templates/formulario_propiedad.php'); ?>

        <input type="submit" value="Actualizar propiedad" class="boton-verde">
    </form>

</main>
<?php
incluirTemplate("footer");
?>