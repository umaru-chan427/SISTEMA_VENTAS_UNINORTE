<?php

// La clase Producto hereda las funciones de la clase Conectar
class Producto extends Conectar
{
    // Obtiene todos los productos de la base de datos
    public function get_producto()
    {
        // Establece la conexión con la base de datos
        $conectar = parent::conexion();

        // Configura la codificación de caracteres
        parent::set_names();

        // Consulta SQL para obtener todos los productos
        $sql = "SELECT * FROM tm_producto WHERE estado = 1";

        // Prepara la consulta SQL
        $sql = $conectar->prepare($sql);

        // Ejecuta la consulta
        $sql->execute();

        // Obtiene y retorna todos los registros encontrados
        $resultado = $sql->fetchAll();

        return $resultado;
    }

    // Obtiene un producto específico mediante su ID
    public function get_producto_x_id($id_producto)
    {
        // Establece la conexión con la base de datos
        $conectar = parent::conexion();

        // Configura la codificación de caracteres
        parent::set_names();

        // Consulta SQL utilizando un parámetro
        $sql = "SELECT * FROM tm_producto WHERE id_producto = ?";

        // Prepara la consulta
        $sql = $conectar->prepare($sql);

        // Asigna el ID recibido al parámetro de la consulta
        $sql->bindValue(1, $id_producto);

        // Ejecuta la consulta
        $sql->execute();

        // Obtiene y retorna el resultado
        $resultado = $sql->fetchAll();

        return $resultado;
    }

    // Elimina un producto según su ID
    public function delete_producto($id_producto)
    {
        // Establece la conexión con la base de datos
        $conectar = parent::conexion();

        // Configura la codificación de caracteres
        parent::set_names();

        // Consulta SQL para eliminar el producto
        $sql = "UPDATE tm_producto
                SET
                    estado = 0,
                    fecha_eliminacion = now()
                WHERE
                    id_producto = ?";

        // Prepara la consulta
        $sql = $conectar->prepare($sql);

        // Asigna el ID del producto al parámetro
        $sql->bindValue(1, $id_producto);

        // Ejecuta la consulta
        $sql->execute();

        // Obtiene el resultado de la operación
        $resultado = $sql->fetchAll();

        return $resultado;
    }


    // Inserta un nuevo producto
    public function insert_producto($nom_prod)
    {
        // Establece la conexión con la base de datos
        $conectar = parent::conexion();

        // Configura la codificación de caracteres
        parent::set_names();

        // Consulta SQL para insertar un producto
        $sql = "INSERT INTO tm_producto
                (id_producto, nom_prod, fecha_creacion, fecha_modificacion, fecha_eliminacion, estado)
                VALUES (NULL, ?, now(), NULL, NULL, 1)";

        // Prepara la consulta
        $sql = $conectar->prepare($sql);

        // Asigna el nombre del producto al parámetro
        $sql->bindValue(1, $nom_prod);

        // Ejecuta la consulta
        $sql->execute();

        // Obtiene el resultado de la operación
        $resultado = $sql->fetchAll();

        return $resultado;
    }

    public function update_producto($id_producto, $nom_prod){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE tm_producto
            SET
                nom_prod=?,
                fecha_modificacion=now()
            WHERE
                id_producto = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$nom_prod);
        $sql->bindValue(2, $id_producto);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}

?>