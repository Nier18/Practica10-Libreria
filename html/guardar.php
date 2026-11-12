<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cara B Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">Cara B Libros</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="registro.html">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="consulta.php">Consulta</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-4">Registro de libros</h1>

        <?php
            $con = mysqli_connect("db", "usuario", "123456", "libreria");

            if (mysqli_connect_errno()) {
                echo "<p>Falló la conexión con MySQL: " . mysqli_connect_error() . "</p>";
            }

            $autor = mysqli_real_escape_string($con, $_POST["autor"]);
            $titulo = mysqli_real_escape_string($con, $_POST["titulo"]);
            $fecha = mysqli_real_escape_string($con, $_POST["fecha"]);
            $portada = mysqli_real_escape_string($con, file_get_contents($_FILES["portada"]["tmp_name"]));

            $sql = "INSERT INTO libros (autor, titulo, fecha_publicacion, portada)
                VALUES ('$autor', '$titulo', '$fecha', '$portada');";

            if(!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error($con));
            } else {
                echo "<div class='alert alert-success'>El libro se ha registrado correctamente.</div>";
            }

            mysqli_close($con);
        ?>

        <a class="btn btn-dark" href="registro.html">Registrar otro libro</a>
        <a class="btn btn-outline-dark" href="consulta.php">Ver el catálogo</a>
    </div>
</body>
</html>
