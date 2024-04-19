<?php

class Empleado_Controlador {
    public function __construct(){}

    public function error(){
        require_once('Vistas/error.php');
    } 

    public function index(){ 
        $empleados = Empleado::listar_todos();
        require_once('Vistas/Empleado/index.php');
    } 

    public function validarCorreo(){
        $correo = Empleado::validarCorreo();
    }

    public function indexEmpleado(){
        $empleados = Empleado::listar_empleado($_GET['id_empleado']);
        require_once('Vistas/Empleado/indexEmpleado.php');
    } 

    public function frm_cambiarClaveAdm(){ 
        require_once('./Vistas/Empleado/frm_cambiarClaveAdm.php');
    }

    public function frm_cambiarClaveUsu(){ 
        require_once('Vistas/Empleado/frm_cambiarClaveUsu.php');
    }

    public function cambiarClaveAdm($empleado, $clave){
        $empleado = Empleado::cambiarClaveAdm($empleado, $clave);
        header('Location: ../index.php');
    }

    public function cambiarClaveUsu($empleado, $clave){
        $empleado = Empleado::cambiarClaveUsu($empleado, $clave);
        header('Location: ../index.php');
    }

    public function frm_login(){ 
        require_once('Vistas/Empleado/frm_login.php');
    }

    public function frm_signup(){
        require_once('Vistas/Empleado/frm_signup.php');
    }
    
    public function frm_registrar_empleado(){
        require_once('Vistas/Empleado/frm_registrar_empleado.php');
    }
    
    public function frm_modificar_empleado(){
        require_once('Modelos/Empleado.php');
        $empleado = Empleado::obtenerPorId($_GET['id_empleado']);
        require_once('Vistas/Empleado/frm_modificar_empleado.php');
    }
    
    public function frm_modificar_administrador(){
        require_once('Modelos/Empleado.php');
        $empleado = Empleado::obtenerPorId($_GET['id_empleado']);
        require_once('Vistas/Empleado/frm_modificar_administrador.php');
    }
    
    public function eliminar_administrador(){
        Empleado::eliminar_empleado($_GET['id_empleado']);
    }
    
    public function eliminar_empleado(){
        Empleado::eliminar_empleado($_GET['id_empleado']);
    }
    
    public function desactivar_estado_empleado($id_empleado, $on){
        require_once('../Modelos/Empleado.php');
        if($on == 1){
            return Empleado::desactivar_estado_empleado($id_empleado);
        } else {
            return Empleado::activar_estado_empleado($id_empleado);	
        }
    }
    
    public function activar_estado_empleado($id_empleado){
        require_once('../Modelos/Empleado.php');
        return Empleado::activar_estado_empleado($id_empleado);
    }
    
    public function desactivarEstadoLista(){
        require_once('Modelos/Empleado.php');
        Empleado::desactivarEstadoLista($_GET['id_empleado']);
    }
    
    public function activarEstadoLista(){
        require_once('Modelos/Empleado.php');
        Empleado::activarEstadoLista($_GET['id_empleado']);
    }
    
    public function registrar_empleado($empleado){
        Empleado::registrar_empleado($empleado);
        session_start();
        $_SESSION['guardar'] = "Agregado Con Éxito";
        header('Location: ../index.php');
    } 
    public function modificar_empleado($id_empleado, $cedula, $nombre, $apellido, $fecha_contratacion, $salario, $telefono, $correo, $clave){
        Empleado::modificar_empleado($id_empleado, $cedula, $nombre, $apellido, $fecha_contratacion, $salario, $telefono, $correo, $clave);
        session_start();
        $_SESSION['modificar'] = "Se Han Modificado Los Datos Con Éxito";
        header('Location: ../index.php');
    }
    
    public function modificar_administrador($id_empleado, $cedula, $nombre, $apellido, $fecha_contratacion, $salario, $telefono, $correo, $clave){
        Empleado::modificar_administrador($id_empleado, $cedula, $nombre, $apellido, $fecha_contratacion, $salario, $telefono, $correo, $clave);
        session_start();
        $_SESSION['modificar'] = "Se Han Modificado Los Datos Con Éxito";
        header('Location: ../index.php');
    }
    
    public function login_empleado($correo, $clave){
        $empleado = Empleado::login_empleado($correo, $clave);
        if($empleado){
            session_start();
            $_SESSION['acceso'] = $empleado;
        }
        header('Location: ../index.php');
    } 
    
    public function obtener_por_identificacion($id_empleado){
        $empleado = Empleado::obtener_por_identificacion($id_empleado);
        return $empleado;
    }
    
    public function obtener_por_referencia($correo){
        $empleado = Empleado::obtener_por_referencia($correo);
        return $empleado;
    }
    
    public function obtener_por_id($id_empleado){
        $empleado = Empleado::obtener_por_id($id_empleado);
        return $empleado;
    }
    
    public function buscar_tipo_empleado($id_empleado){
        $empleados = Empleado::buscar_tipo_empleado($id_empleado);
        return $empleados;
    }
    
    public function modificar_clave($correo, $clave){
        Empleado::modificar_clave($correo, $clave);
    }
}