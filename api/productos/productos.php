<?php

require_once('../../lib/db.php');

class Productos extends Conexion
{
    function __construct()
    { //Llama al constructor de la clase padre
        parent::__construct();
    }

    public function get($id)
    {
        $query = $this->db->prepare('SELECT * FROM productos WHERE id = :id LIMIT 0,12');
        $query->execute(['id' => $id]);
        //Regresa un arreglo
        $result = $query->fetch();
        return [
            'id'        => $result['id'],
            'nombre'    => $result['nombre'],
            'precio'    => $result['precio'],
            'imagen'    => $result['imagen'],
            'categoria' => $result['categoria']
        ];
    }

    public function getItemsByCategory($category)
    {
        $statement = $this->db->prepare('SELECT * FROM productos WHERE categoria = :category LIMIT 0,12');
        $statement->bindParam(':category', $category);
        $statement->execute();

        $rows = []; // Inicializa $rows como un array vacío
        //Recorre los resultados y se usa while porque no
        //sabemos la cantidad de recorrido sobre una sentencia
        //Lo que nos traiga lo guardamos en result y luego en rows
        while ($result = $statement->fetch()) { //Fetch = resultados de la consulta
            $rows[] = [
                'id'        => $result['id'],
                'nombre'    => $result['nombre'],
                'precio'    => $result['precio'],
                'imagen'    => $result['imagen'],
                'categoria' => $result['categoria']
            ];
        }
        return json_encode( $rows);
    }
}
