<?php

    namespace app\controllers\auth;

    use app\controllers\Controller as Controller;
    use app\classes\Views as View;
    use app\classes\Redirect as Redirect;
    use app\models\usuarios as user;

    class LoginController extends Controller {
        public function __construct(){
            parent::__construct();
        }

        public function index( $params = null){
            $response = [
                'ua'    => ['sv' => 0],
                'title' => 'Iniciar sesión',
                'code'  => 200
            ];
            View::render('auth/login',$response);
        }

        public function genereteHash(){
            $password = filter_input(INPUT_POST, 'contrasena', FILTER_SANITIZE_SPECIAL_CHARS);
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $this -> apiResponse(true, 'Hash generado', $hash);
        }

        public function userAuth(){
            $datos = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $user = new user();

            $result = $user -> where([["correo",$datos["correo"]]])
                            ->get();
            if( count( json_decode($result)) > 0){
                $user_db = json_decode($result)[0];
                if(password_verify($datos["contrasena"], $user_db->contrasena)){
                    $result = json_decode( $result );
                    // remplazamos la contraseña de result por la contraseña de datos
                    $result[0]->contrasena = $datos["contrasena"];
                    $this -> sessionRegister( $result );
                }else{
                    self::sessionDestroy();
                    $this -> apiResponse(false, 'Error al iniciar sesión', null, 'Contraseña incorrecta');
                }
            }else{
                self::sessionDestroy();
                $this -> apiResponse(false, 'Error al iniciar sesión', null, 'Usuario no encontrado');
            }
        }

        private function sessionRegister( $datos ){
            session_start();
            $_SESSION['sv']       = true;
            $_SESSION['IP']       = $_SERVER['REMOTE_ADDR'];
            $_SESSION['id']       = $datos[0]->id;
            $_SESSION['nombre']   = $datos[0]->nombre;
            $_SESSION['correo']   = $datos[0]->correo;
            $_SESSION['rol_id']   = $datos[0]->rol_id;
            $_SESSION['activo']   = $datos[0]->activo;
            $_SESSION['contrasena'] = $datos[0]->contrasena;
            unset($datos[0]->contrasena);
            session_write_close();
            $this -> apiResponse(true, 'Inicio de sesión exitoso', $datos[0]);
        }

        public static function sessionValidate(){
            $user = new user();
            session_start();
            if( isset( $_SESSION['sv']) && $_SESSION['sv'] == true){
                $datos = $_SESSION;
                $result = $user -> where([["correo",$datos["correo"]]])
                                ->get();
                if( count( json_decode( $result )) > 0){
                    $user_db = json_decode($result)[0];
                    if(password_verify($datos["contrasena"], $user_db->contrasena)){
                        session_write_close();
                        return ['nombre' => $datos['nombre'],
                                'sv' => $datos['sv'],
                                'id' => $datos['id'],
                                'rol_id' => $datos['rol_id'],
                                'activo' => $datos['activo']];
                    }else{
                        session_write_close();
                        self::sessionDestroy();
                        return null;
                    }
                }else{
                    session_write_close();
                    self::sessionDestroy();
                    return null;
                }
            }
            session_write_close();
            self::sessionDestroy();
            return null;
        }

        public static function sessionDestroy(){
            session_start();
            $_SESSION = ['sv' => false];
            session_destroy();
            session_write_close();
            return;
        }

        public static function logout(){
            self::sessionDestroy();
            Redirect::to('/login');
            exit();
        }

    }