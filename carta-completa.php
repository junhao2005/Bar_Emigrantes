<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- enlace bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- hoja de estilos -->
    <link rel="stylesheet" href="./css/style.css">
    <title>Carta Bar Emigrantes</title>
</head>
<body>

    <!-- <?php
        if (file_exists ('./xml/carta.xml')) {
            $films = simplexml_load_file('./xml/carta.xml');
        } else {
            exit ('Error abriendo el archivo de datos');
        }
    ?> -->

    <header>
        <div><a href="index.php" class="logo">Bar Emigrantes</a></div>
        <div><a href="https://maps.app.goo.gl/TB6keWK3qxoW5MPS8" class="location">📍Ubicación</a></div>
        <div><a href="carta-completa.php" class="location">🍴Carta</a></div>
        <div><a href="galeria.php" class="location">📸Galeria</a></div>
    </header>
    
    <div>
        <img src="img/head.png" class="headimg" alt="...">
    </div>

    <br>

    <?php
        $xml = simplexml_load_file('xml/carta.xml'); // Cargar el archivo XML

        // Si se ha enviado el filtro de carta
        $cartaFiltro = isset($_GET['carta']) ? $_GET['carta'] : '';
    ?>

<!-- Formulario de filtro para seleccionar la carta -->
<form method="GET" class="filtro-form">
    <label for="carta" class="filtro-label">Filtrar por carta:</label>
    <select name="carta" id="carta" class="filtro-select">
        <option value="">Carta Completa</option>
        <option value="Tapas" <?php echo $cartaFiltro == 'Tapas' ? 'selected' : ''; ?>>Tapas</option>
        <option value="Casa" <?php echo $cartaFiltro == 'Casa' ? 'selected' : ''; ?>>Casa</option>
        <option value="Bocadillo Frío" <?php echo $cartaFiltro == 'Bocadillo Frío' ? 'selected' : ''; ?>>Bocadillo Frío</option>
        <option value="Bocadillo Caliente" <?php echo $cartaFiltro == 'Bocadillo Caliente' ? 'selected' : ''; ?>>Bocadillo Caliente</option>
    </select>
    <button type="submit" class="filtro-btn">Filtrar</button>
</form>

<!-- Tabla de Platos -->
<table class="tabla-carta table table-striped table-hover">
    <thead class="tabla-header">
        <tr>
            <th>Plato</th>
            <th>Precio</th>
            <th>Carta</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Recorrer los platos del XML y mostrar aquellos que coinciden con el filtro de carta
        foreach ($xml->film as $film) {
            if ($cartaFiltro == '' || $film['carta'] == $cartaFiltro) {
                echo '<tr>';
                echo '<td>' . $film->title . '</td>';
                echo '<td>' . $film->p . '</td>';
                echo '<td>' . $film['carta'] . '</td>';
                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>


<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>