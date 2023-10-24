<?php
    require 'ConexionBD.php'; 

    class Nego_Soli{

        function Sol_Alumnos()
        {
            $db = new ConexionDB();                                             //creamos una instancia de la clase                                             

            $result = $db ->Conectar();                                         //conectamos a base de datos                                         
            $params = null;                                                      

            $result = $db->EjecutarProsAlmacen('ConsultarAlumno', $params);     //ejecutamos el codigo designado para los storedprocedures

            if ($result) {
                $db->Cerrar();                                                  //importante cerrar la conexion no solo por buena praxis si no por no levantar mas de 1 instancia cada vez que se hace la funcion                                                  
                return $result;
            } else {
                null;
            }
        }

        function Ins_Alumno($params)
        {
            $db = new ConexionDB();                                             

            $result = $db ->Conectar();                                         

            $result = $db->EjecutarProsAlmacen('InsertarAlumno', $params);     //ejecutamos el codigo designado para los storedprocedures

            if ($result) {
                $db->Cerrar();                                                  
                return $result;
            } else {
                null;
            }
        }

        function Upd_Alumno($params)
        {
            $db = new ConexionDB();                                             

            $result = $db ->Conectar();                                          

            $result = $db->EjecutarProsAlmacen('ActualizarAlumno', $params);     //ejecutamos el codigo designado para los storedprocedures

            if ($result) {
                $db->Cerrar();                                                  
                return $result;
            } else {
                null;
            }
        }

        function Elim_Alumno($params)
        {
            $db = new ConexionDB();                                             

            $result = $db ->Conectar();                                         

            $result = $db->EjecutarProsAlmacen('EliminarAlumno', $params);     //ejecutamos el codigo designado para los storedprocedures

            if ($result) {
                $db->Cerrar();                                                  
                return $result;
            } else {
                null;
            }
        }
        function Ins_Curs($params)
        {
            $db = new ConexionDB();                                             

            $result = $db ->Conectar();                                         

            $result = $db->EjecutarProsAlmacen('InsertarCurso', $params);     //ejecutamos el codigo designado para los storedprocedures

            if ($result) {
                $db->Cerrar();                                                  
                return $result;
            } else {
                null;
            }
        }
        function Ins_Alumno_Curs($params)
        {
            $db = new ConexionDB();                                             

            $result = $db ->Conectar();                                         

            $result = $db->EjecutarProsAlmacen('InsertarCursoAlumno', $params);     //ejecutamos el codigo designado para los storedprocedures

            if ($result) {
                $db->Cerrar();                                                  
                return $result;
            } else {
                null;
            }
        }
    }
?>