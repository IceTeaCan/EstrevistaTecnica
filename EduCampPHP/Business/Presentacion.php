<?php
    include '../Data/Trade.php';                                                        // Capa de entrega de información sql

    class ObtenerData{
  
        function Obtn_AlDt()
        {
            try {
                $layer = new Nego_Soli();                                               //creamos un nuevo objeto negocio 
                $data = $layer ->Sol_Alumnos();                                         //llamamos a la función que comunica a la bd e intermedia los parámetros                                          
                return $data;
            }catch (Exception $e) {
                $_SESSION['error_message'] = 'Ha ocurrido un error: ' . $e->getMessage();   // en caso de alguna exepción en esta área se maneja para no botar el programa y se notifica con un formulario
                header('Location: 404.php');                                                //enviamos al formulario error
                exit;
            }
        }

        function Inser_Alumno($params)
        {
            try {
                $layer = new Nego_Soli(); 
                $data = $layer ->Ins_Alumno($params);                                         
                return $data;
            }catch (Exception $e) {
                $_SESSION['error_message'] = 'Ha ocurrido un error: ' . $e->getMessage();
                header('Location: 404.php');
                exit;
            }
        }


        function Send_Alumno($params)
        {
            try {
                $layer = new Nego_Soli(); 
                $data = $layer ->Upd_Alumno($params);                                         
                return $data;
            }catch (Exception $e) {
                $_SESSION['error_message'] = 'Ha ocurrido un error: ' . $e->getMessage();
                header('Location: 404.php');
                exit;
            }
        }

        function Eliminar_Alumno($params)
        {
            try {
                $layer = new Nego_Soli(); 
                $data = $layer ->Elim_Alumno($params);                                         
                return $data;
            }catch (Exception $e) {
                $_SESSION['error_message'] = 'Ha ocurrido un error: ' . $e->getMessage();
                header('Location: 404.php');
                exit;
            }
        }

        function Inser_Curso($params)
        {
            try {
                $layer = new Nego_Soli(); 
                $data = $layer ->Ins_Curs($params);                                         
                return $data;
            }catch (Exception $e) {
                $_SESSION['error_message'] = 'Ha ocurrido un error: ' . $e->getMessage();
                header('Location: 404.php');
                exit;
            }
        }
        function Inser_Alumno_Curso($params)
        {
            try {
                $layer = new Nego_Soli(); 
                $data = $layer ->Ins_Alumno_Curs($params);                                         
                return $data;
            }catch (Exception $e) {
                $_SESSION['error_message'] = 'Ha ocurrido un error: ' . $e->getMessage();
                header('Location: 404.php');
                exit;
            }
        }
    }
?>