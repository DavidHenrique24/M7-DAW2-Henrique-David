<?php 
$frutas = [
    ["nombre" => "Manzana", "estado" => false, "imagen" => "https://static.vecteezy.com/system/resources/previews/023/858/853/non_2x/ai-genrative-green-apple-free-png.png"],
    ["nombre" => "Plátano", "estado" => false, "imagen" => "https://biovergel.es/wp-content/uploads/2020/04/platanos-de-canarias.jpg"],
    ["nombre" => "Naranja", "estado" => false, "imagen" => "https://www.ammarket.com/wp-content/uploads/2021/12/NARANJA_MESA_AMMARKET.COM_2.jpg"],
    ["nombre" => "Fresa", "estado" => false, "imagen" => "https://libbys.es/wordpress/wp-content/uploads/2018/05/fresas.jpg"],
    ["nombre" => "Kiwi", "estado" => false, "imagen" => "https://vegadeaguin.com/wp-content/uploads/2021/09/home_producto_kiwi.jpg"]
];

// Verifica si se ha seleccionado una fruta
$frutaSeleccionada;
if (isset($_GET['fruta'])) {
    $frutaSeleccionada = $_GET['fruta']; //
    foreach ($frutas as &$fruta) {
        $fruta['estado'] = ($fruta['nombre'] === $frutaSeleccionada);
    }
}

// Función para mostrar las frutas
function mostrarFrutas($frutas) {
    foreach ($frutas as $fruta) {
        $estado = $fruta['estado'] ? '✔ Seleccionada' : '✖ No seleccionada';
        $clase = $fruta['estado'] ? 'table-success' : 'table-danger';
        echo "<tr class='$clase'>
                <td>{$fruta['nombre']}</td>
                <td>$estado</td>
                <td>
                    <a class='btn btn-primary' href='?fruta=" . urlencode($fruta['nombre']) . "'>Seleccionar</a>
                </td>
              </tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Frutas favoritas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Selecciona tu fruta favorita</h1>

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Fruta</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php mostrarFrutas($frutas); ?>
            </tbody>
        </table>

        <?php if ($frutaSeleccionada): ?>
            <!-- Mostrar tarjeta de la fruta seleccionada -->
            <div class="card mt-4 w-25 shadow-lg">
                <img src="<?= $frutas[array_search($frutaSeleccionada, array_column($frutas, 'nombre'))]['imagen'] ?>" class="card-img-top img-fluid" alt="<?= $frutaSeleccionada ?>">
                <div class="card-body bg-warning">
                    <h5 class="card-title"><?= $frutaSeleccionada ?></h5>
                    <p class="card-text">¡Esta es tu fruta favorita!</p>
                </div>
            </div>
        <?php endif; ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
