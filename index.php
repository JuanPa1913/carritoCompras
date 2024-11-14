<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        require_once('layout/menu.php');
    ?>

    <main>
        <?php
            header('Content-Type: application/json');
            // $response =  file_get_contents('http://localhost/carritoCompras/api/productos/api-productos.php?categoria=juguetes');
            // echo $response;

            $response = json_decode(file_get_contents('http://localhost/carritoCompras/api/productos/api-productos.php?categoria=juguetes'),true);
            var_dump($response);
            // $response = json_decode($jsonString, true);  // true convierte el JSON en un array asociativo
            //     foreach ($response['items'] as $item) {
            //    include('layout/items.php');
            // }
        ?>
    </main>

    <script src="js/main.js"></script>
</body>
</html>