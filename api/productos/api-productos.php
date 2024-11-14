<!--
 200 OK: Este código indica que la solicitud fue exitosa y que el servidor devolvió la respuesta esperada.
Por ejemplo, si pides una lista de productos y el servidor la envía correctamente, recibirías un 200 OK en la respuesta.

404 Not Found:

Este código indica que el recurso solicitado no se encontró en el servidor.
Por ejemplo, si pides un producto que no existe o usas una categoría que no está en la base de datos, el servidor puede responder con un 404 Not Found para indicar que no encontró lo solicitado.

400 Bad Request:

Este código indica que la solicitud fue incorrecta o mal formada.
Esto puede suceder si faltan datos requeridos en la solicitud o si los datos están en un formato incorrecto. Por ejemplo, si no envías el parámetro categoria o lo envías vacío, podrías recibir un 400 Bad Request indicando que la solicitud no es válida. -->


<?php

require_once('productos.php');

if (isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];

    if ($categoria == '') {
        echo json_encode(['statuscode' => 400, 'response' => 'La categoria esta vacia']);
    } else {
        $productos = new Productos();
        $items = $productos->getItemsByCategory($categoria);

        if (empty($items)) {
            // Si $items está vacío, mostramos un mensaje indicando que no se encontraron productos
            echo json_encode(['statuscode' => 404, 'response' => 'No existe la categoria']);
        } else {
            // Si hay productos, los mostramos en el JSON
            echo json_encode(['statuscode' => 200, 'items' => $items]);
        }
    }
} else {
    echo json_encode(['statuscode' => 400, 'response' => 'No hay accion']);
}
