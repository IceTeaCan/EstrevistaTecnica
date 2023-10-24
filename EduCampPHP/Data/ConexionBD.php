<?php
session_start();
class ConexionDB {
    private $host = 'LAPTOP-66RN5V7I';
    private $database = 'EduCamp';
    public $pdo;

    //use estas constantes si usa SQL authentification
    //private $username = '';
    //private $password = '';

    public function Conectar() {                                                                        // el $this se utiliza para referenciar variables y contenido de clase, lo hace mas legible y simple
        try {
            $this->pdo = new PDO("sqlsrv:Server=$this->host;Database=$this->database", null, null);     // conexion a base de datos sql con PDO y windows authentification
                                                                                                        //$this->pdo = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password); !-!-!-!-!-!-! use este string si su conexión a sql es por medio de sql authentification
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                        // atributos de excepciones de PDO en caso de errores
            return null;
        } catch (PDOException $e) {
            ob_start();
            $_SESSION['error_message'] = 'Ha ocurrido un error: ' . $e->getMessage();
            header('Location: 404.php');
            exit;                           // mensaje de error
        }
    }
    public function Cerrar()                                                                            //cerrar la conexion cada vez que se pide informacion libera trabajo al servidor ademmas de permitir un codigo mas simple
    {
        $this->pdo =null;
    }

    public function EjecutarProsAlmacen($procedimiento, $params= array()) {
        try{
            if(empty($params))
            {
                $sql= "EXEC $procedimiento";
            }else {
                $paramPlaceholders = implode(',', array_fill(0, count($params), '?'));                      // formato para evitar sql injections, al recibir el contenido crea un array con pociciones marcadas que se utilizará para guardarle los lugares a los parámetros
                $sql = "EXEC $procedimiento $paramPlaceholders";                                            //ejecuta procedimiento y envia los datos es el formato correcto
            }
            $consulta = $this->pdo->prepare($sql);                                                          // prepara la solicitud para trabajarla con sql
            $consulta->execute($params);                                                                    // ejecuta la solicitud insertando contenidos a los lugares del placeholder
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $errorcheck =$e->getMessage();
            if($errorcheck == "SQLSTATE[IMSSP]: The active result for the query contains no fields.")       //si la poreacion es exitosa y no devuelve valores
            {
                header('Location: blank.php');
            }else {
                ob_start();
                $_SESSION['error_message'] = 'Ha ocurrido un error: ' . $e->getMessage();
                header('Location: 404.php');
            }
            exit;
        }
    }
}
?>