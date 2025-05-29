<?php 

    namespace app\controllers;
    use app\models\categorias as categorias;

    /**
     * Controlador para la gestión de categorías.
     * Permite obtener, crear y editar categorías mediante endpoints API.
     */
    class CategoriasController extends Controller {

        /**
         * Constructor. Inicializa el controlador.
         */
        public function __construct(){
            parent::__construct();
        }

        /**
         * Obtiene todas las categorías (estático, para uso interno de otros controladores).
         * @return array Lista de categorías
         */
        public static function getAllCategorias(){
            $categorias = new categorias();
            $result = $categorias -> getAll();
            return $result;
        }   

        /**
         * Endpoint API: Devuelve todas las categorías en formato JSON.
         * @return void
         */
        public function getAll(){
            $categorias = new categorias();
            try {
                $result = $categorias -> getAll();
                $this->apiResponse(true, 'Categorias obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

        /**
         * Endpoint API: Crea una nueva categoría a partir de los datos recibidos por POST.
         * @param mixed $params Parámetros de la petición (opcional)
         * @return void
         */
        public function createCategoria($params = null){
            $categorias = new categorias();
            try {
                $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $result = $categorias -> createCategoria($data);
                $this->apiResponse(true, 'Categoria creada correctamente', $result);
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al crear', null, $th->getMessage());
            }
        }

        /**
         * Endpoint API: Edita una categoría existente con los datos recibidos por POST.
         * @param mixed $params Parámetros de la petición (opcional)
         * @return void
         */
        public function editCategoria($params = null){
            $categorias = new categorias();
            try {
                $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $result = $categorias -> editCategoria($data);
                $this->apiResponse(true, 'Categoria editada correctamente', $result);
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al editar', null, $th->getMessage());
            }
        }

    }