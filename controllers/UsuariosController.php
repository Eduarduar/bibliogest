<?php 

    namespace app\controllers;
    use app\models\usuarios as users;

    /**
     * Controlador para la gestión de usuarios.
     */
    class UsuariosController extends Controller {

        /**
         * Constructor. Inicializa el controlador.
         */
        public function __construct(){
            parent::__construct();
        }

        /**
         * Obtiene todos los usuarios (estático, para uso interno de otros controladores).
         * @return array Lista de usuarios
         */
        public static function getAllUsers(){
            $users = new users();
            $result = $users -> getAllUsers();
            return $result;
        }
        
        /**
         * Endpoint API: Devuelve todos los usuarios en formato JSON.
         * @return void
         */
        public function getAll(){
            $users = new users();
            try {
                $result = $users -> getAllUsers();
                $this->apiResponse(true, 'Usuarios obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

        /**
         * Endpoint API: Registra un nuevo usuario a partir de los datos recibidos por POST.
         * @param mixed $params Parámetros de la petición (opcional)
         * @return void
         */
        public function addUser($params = null) {
            $user = new users();
            try {
                $result = $user->newUser(filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
                $this->apiResponse(true, 'Usuario registrado correctamente', $result);
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al registrar', null, $th->getMessage());
            }
        }

        /**
         * Endpoint API: Edita un usuario existente con los datos recibidos por POST.
         * @param mixed $params Parámetros de la petición (opcional)
         * @return void
         */
        public function editUser($params = null){
            $user = new users();
            try {
                $result = $user->editUser(filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
                $this->apiResponse(true, 'Usuario editado correctamente', $result);
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al editar', null, $th->getMessage());
            }
        }

        /**
         * Endpoint API: Cambia el estado de un usuario (habilitar o deshabilitar).
         * @param mixed $params Parámetros de la petición (opcional)
         * @return void
         */
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

        /**
         * Endpoint API: Devuelve el catálogo de usuarios activos en formato JSON.
         * @return void
         */
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