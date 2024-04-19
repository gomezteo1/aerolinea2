<?php
  
    class Empleado{
        public $id_empleado;
        public $cedula;
        public $nombre;
        public $apellido;
        public $fecha_contratacion;
        public $salario;
        public $telefono;
        public $correo;
        public $clave;
        
        function __construct($id_empleado, $cedula, $nombre, $apellido, $fecha_contratacion, $salario, $telefono, $correo, $clave){
            $this->id_empleado = $id_empleado;
            $this->cedula = $cedula;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->fecha_contratacion = $fecha_contratacion;
            $this->salario = $salario;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->clave = $clave;
        }

        public static function listar_empleado($id_empleado){
            $listar_empleados = [];
            $db = Db::getConnect();
            $sql = $db->query("SELECT * FROM empleado e inner join rol r on u.id_rol = r.id_rol inner join tipo_documento t on u.cedula = t.cedula where id_empleado = '$id_empleado'" );
            foreach($sql->fetchAll() as $empleado){
                $itemempleado = new Empleado(
                    $empleado['id_empleado'],
                    $empleado['cedula'], 
                    $empleado['nombre'], 
                    $empleado['apellido'],
                    $empleado['fecha_contratacion'],  
                    $empleado['salario'], 
                    $empleado['telefono'],
                    $empleado['correo'],   
                    $empleado['clave']
                );
                $listar_empleados[] = $itemempleado;
            }
            return $listar_empleados;
        }
        
        public static function listar_todos(){
            $listar_empleados = [];
            $db = Db::getConnect();
            $sql = $db->query("SELECT DISTINCT u.*,r.rol,t.documento FROM empleado u 
                inner join rol r on u.id_rol = r.id_rol 
                inner join tipo_documento t on u.cedula = t.cedula  
            ");
            foreach($sql->fetchAll() as $empleado){
                $itemempleado = new empleado(
                    $empleado['id_empleado'], 
                    $empleado['cedula'], 
                    $empleado['nombre'], 
                    $empleado['apellido'], 
                    $empleado['fecha_contratacion'],  
                    $empleado['salario'], 
                    $empleado['telefono'], 
                    $empleado['correo'],   
                    $empleado['clave']
                );
                
                $listar_empleados[] = $itemempleado;
            }
            return $listar_empleados;
        } 
        
       
        public static function registrar_empleado($empleado){
            $db = DB::getConnect();
            $insert = $db->prepare("INSERT INTO empleado VALUES(:id_empleado, :cedula, :nombre, :apellido, :fecha_contratacion, :salario, :telefono, :correo, :clave)"); 
            $insert->bindValue(':id_empleado', $empleado->id_empleado);
            $insert->bindValue(':cedula', $empleado->cedula);
            $insert->bindValue(':nombre', $empleado->nombre);
            $insert->bindValue(':apellido', $empleado->apellido);
            $insert->bindValue(':fecha_contratacion', $empleado->fecha_contratacion);
            $insert->bindValue(':salario', $empleado->salario);
            $insert->bindValue(':telefono', $empleado->telefono);
            $insert->bindValue(':correo', $empleado->correo);
            $insert->bindValue(':clave', $empleado->clave);
            $insert->execute();  
        }
        
        public static function modificar_empleado($id_empleado, $cedula, $nombre, $apellido, $salario, $id_rol, $telefono, $fecha_contratacion, $estado, $correo, $correo_recuperacion){ 
            $db = Db::getConnect();
            $update = $db->prepare("UPDATE empleado SET cedula =$cedula, nombre ='$nombre', apellido ='$apellido', fecha_contratacion ='$fecha_contratacion', salario =$salario, id_rol =$id_rol, telefono ='$telefono',  estado ='$estado', correo ='$correo' WHERE id_empleado=$id_empleado");
            $update->execute();
        }
        
        
        public static function eliminar_empleado($id_empleado){ 
            $db = Db::getConnect();
            $delete = $db->prepare("DELETE FROM empleado WHERE id_empleado=$id_empleado");
            $delete->execute();                
        }

        //no los uso de momento
        public static function Obtener_por_identificacion($id_empleado){
            $db=DB::getConnect();
            $select=$db->prepare("SELECT * FROM empleado WHERE id_empleado='$id_empleado'");
            $select->execute();
            $empleadoDb=$select->fetch();
            $empleado= new empleado($empleadoDb['id_empleado'], $empleadoDb['nombre'], $empleadoDb['apellido'], $empleadoDb['cedula'], $empleadoDb['salario'], $empleadoDb['id_rol'], $empleadoDb['telefono'], $empleadoDb['fecha_contratacion'], $empleadoDb['estado'], $empleadoDb['clave'], $empleadoDb['correo'], $empleadoDb['correo_recuperacion']);
            return $empleado; 
        }
        
        public static function buscar_tipo_empleado($id_empleado){
            $db = Db::getConnect();
            $sql = $db->prepare("SELECT DISTINCT u.*, r.rol as rol, t.documento as documento FROM empleado u 
                inner join rol r on u.id_rol = r.id_rol 
                inner join tipo_documento t on u.cedula = t.cedula 
                WHERE id_empleado=$id_empleado");
            $listar_empleados = [];
            foreach ($sql->fetchAll() as $empleado) {
                $itemempleado = new empleado(
                    $empleado['id_empleado'], 
                    $empleado['nombre'], 
                    $empleado['apellido'], 
                    $empleado['cedula'], 
                    $empleado['salario'], 
                    $empleado['id_rol'], 
                    $empleado['telefono'], 
                    $empleado['fecha_contratacion'], 
                    $empleado['estado'], 
                    $empleado['clave'], 
                    $empleado['correo'], 
                    
                );
                $listar_empleados[] = $itemempleado;
            }
            return $listar_empleados;
        } 
        
        public static function login_empleado($correo, $clave){
            $db = DB::getConnect();
            $select = $db->prepare("SELECT * FROM empleado WHERE correo='$correo' AND clave='$clave'");
            $select->execute();
            $empleadoDb = $select->fetch();
            return $empleadoDb; 
        }
        
        
    }
?>
