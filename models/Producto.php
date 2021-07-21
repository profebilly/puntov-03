<?php
    class Producto extends Conectar{
        public function get_producto(){
            $conectar= parent::conexion();
            parent::set_name();
            $sql="SELECT * FROM tm_producto WHERE est= 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function get_producto_x_id($pro_id){
            $conectar= parent::conexion();
            parent::set_name();
            $sql="SELECT * FROM tm_producto WHERE prod_id= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$pro_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_producto($pro_id){
            $conectar= parent::conexion();
            parent::set_name();
            $sql="UPDATE tm_producto 
            SET
                est=0,
                    fecha_eli=now()
                        WHERE
                            prod_id= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$pro_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_producto($prod_nom){
            $conectar= parent::conexion();
            parent::set_name();
            $sql="INSERT INTO tm_producto (pro_id, prod_nom, fecha_crea, fecha_mod, fecha_eli, est) VALUES (NULL, '?', now(), NULL, NULL, 1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_nom);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function update_producto($pro_id, $prod_nom){
            $conectar= parent::conexion();
            parent::set_name();
            $sql="UPDATE tm_producto 
            SET
                prod_nom=?,
                    fecha_mod=now()
                        WHERE
                            prod_id= ?";
            $sql=$conectar->prepare($sql);            
            $sql->bindValue(1,$prod_nom);
            $sql->bindValue(2,$pro_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        
    }



?>