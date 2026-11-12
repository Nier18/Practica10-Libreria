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
                    <a class="nav-link" href="registro.html">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="consulta.php">Consulta</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-4">Libros registrados</h1>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mt-1 mb-5">
            <?php
                $con = mysqli_connect("db", "usuario", "123456", "libreria");
                if (mysqli_connect_errno()) {
                    echo "<p>Falló la conexión con MySQL: " . mysqli_connect_error() . "</p>";
                }
                $sql = "SELECT * FROM libros;";
                $resultado = mysqli_query($con, $sql);
                while($row = mysqli_fetch_array($resultado)) {
                    echo "<div class='col'>";
                    echo "<div class='card h-100'>";
                    echo "<img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($row['portada']) . "'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row['titulo'] . "</h5>";
                    echo "<p class='card-text'>" . $row['autor'] . "</p>";
                    echo "</div>";
                    echo "<div class='card-footer'>";
                    echo "<small class='text-muted'>Publicado: " . $row['fecha_publicacion'] . " (id " . $row['id'] . ")</small>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                mysqli_close($con);
            ?>
        </div>
    </div>
</body>
</html>
