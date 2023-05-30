<?php
//Requires
require('includes/app.php');

//Importa la Conexión
$db = conectarDB();

$errores = [];
//Procesar formulario
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    //Variables de metodo POST
    $email = mysqli_real_escape_string($db, filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST["password"]);

    //Arreglo con mensaje de errores

    //Validacion de campos y agregando al arreglo de errores
    if (!$email) {
        $errores[] = "Por favor ingrese el E-MAIL";
    }
    if (!$password) {
        $errores[] = "Por favor ingrese la contraseña";
    }

    //Validacion de Usuarios en la Base de Datos
    if (empty($errores)) {
        //Query Usuarios
        $queryUsuarioPorEmail = "SELECT * FROM usuarios WHERE email='{$email}';";


        //Consulta Usuario por E-MAIL
        $consultaUsuarioEmail = mysqli_query($db, $queryUsuarioPorEmail);


        if ($consultaUsuarioEmail->num_rows) {
            $usuario = mysqli_fetch_assoc($consultaUsuarioEmail);

            //Varificar password
            $auth = password_verify($password, $usuario['password']);
            if ($auth) {
                //Iniciar Sesion Usuario
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['usuario'] = $usuario["email"];
                header("Location:/ProyectosPHP/bienesraices_inicio/admin/index.php");
            } else {
                $errores[] = "Usuario o Contraseña incorrectos";
            }
        } else {

            $errores[] = "Usuario o Contraseña incorrectos";
        }
    }
}

//Incluye el Header
incluirTemplate("header");

?>

<main class="contenedor contenido-centrado">
    <h1>Login</h1>

    <?php
    if (!empty($errores)) {
        foreach ($errores as $error) :

    ?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>

    <?php
        endforeach;
    }
    ?>

    <form method="POST" class="formulario seccion ">
        <fieldset>
            <legend>Credenciales</legend>
            <label for="email">E-MAIL</label>
            <input type="email" name="email" id="email" placeholder="correo@correo.com" required>

            <label for="password">PASSWORD</label>
            <input type="password" name="password" id="password" placeholder="123456" required>
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton-verde">
    </form>
</main>
<?php
incluirTemplate("footer");
?>

<script src="build/js/bundle.min.js"></script>
</body>

</html>