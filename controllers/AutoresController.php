<?php 

    namespace app\controllers;
    use app\models\autores as autores;

    /**
     * Controlador para la gestión de autores.
     * Permite obtener, crear y editar autores mediante endpoints API.
     */
    class AutoresController extends Controller {

        /**
         * Constructor. Inicializa el controlador.
         */
        public function __construct(){
            parent::__construct();
        }

        /**
         * Obtiene todos los autores (estático, para uso interno de otros controladores).
         * @return array Lista de autores
         */
        public static function getAllAutores(){
            $autores = new autores();
            $result = $autores -> getAll();
            return $result;
        }   

        /**
         * Endpoint API: Devuelve todos los autores en formato JSON.
         * @return void
         */
        public function getAll(){
            $autores = new autores();
            try {   
                $result = $autores -> getAll();
                $this->apiResponse(true, 'Autores obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

        /**
         * Endpoint API: Crea un nuevo autor a partir de los datos recibidos por POST.
         * @param mixed $params Parámetros de la petición (opcional)
         * @return void
         */
        public function createAutor($params = null){
            $autores = new autores();
            try {
                $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $result = $autores -> createAutor($data);
                $this->apiResponse(true, 'Autor creado correctamente', $result);
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al crear', null, $th->getMessage());
            }
        }

        /**
         * Endpoint API: Edita un autor existente con los datos recibidos por POST.
         * @param mixed $params Parámetros de la petición (opcional)
         * @return void
         */
        public function editAutor($params = null){
            $autores = new autores();
            try {
                $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $result = $autores -> editAutor($data);
                $this->apiResponse(true, 'Autor editado correctamente', $result);
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al editar', null, $th->getMessage());
            }
        }
    }