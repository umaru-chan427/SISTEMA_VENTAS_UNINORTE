<?php
    class Conectar {

    protected $dbh;

         
    public function Conexion(){ 

        try{

            $this->dbh = new PDO("mysql:host=localhost;dbname=ventas;charset=utf8",
               "root",
                "",
                 [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                 ]
            
             );

                echo "Conexión exitosa a la base de datos";
                return $this->dbh;

             }catch (PDOException $e){
                echo "Error BD: ". $e->getMessage();
                die();

            }

        } 

        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
    $conexion = new Conectar();
    $conexion->Conexion();
?>