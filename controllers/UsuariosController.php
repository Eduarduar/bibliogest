<?php 

    namespace app\controllers;
    use app\models\usuarios as users;

    class UsuariosController extends Controller {

        public function __construct(){
            parent::__construct();
        }


        public static function getAllUsers(){
            $users = new users();
            $result = $users -> getAllUsers();
            return $result;
        }
        
        public function getAll(){
            $users = new users();
            try {
                $result = $users -> getAllUsers();
                $this->apiResponse(true, 'Usuarios obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

        public function addUser($params = null) {
            $user = new users();
            try {
                $result = $user->newUser(filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
                $this->apiResponse(true, 'Usuario registrado correctamente', $result);
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al registrar', null, $th->getMessage());
            }
        }

        public function editUser($params = null){
            $user = new users();
            try {
                $result = $user->editUser(filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
                $this->apiResponse(true, 'Usuario editado correctamente', $result);
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al editar', null, $th->getMessage());
            }
        }

        public function toggleUser($params = null){
            $user = new users();
            try {
                list(,,$id,$activo) = $params;
                $activo = $activo == 1 ? true : false;
                $result = $user->toggleUser($id,$activo);
                $this->apiResponse(true, 'Usuario ' . ($activo ? 'habilitado' : 'deshabilitado') . ' correctamente', $result);
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al ' . ($activo ? 'habilitar' : 'deshabilitar'), null, $th->getMessage());
            }
        }

        public function getCatalog(){
            $users = new users();
            try {
                $result = $users -> getCatalogUsers();
                $this->apiResponse(true, 'Usuarios obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

        public static function getCatalogUsers(){
            $users = new users();
            $result = $users -> getCatalogUsers();
            return $result;
        }

    }