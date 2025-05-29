<?php 

    namespace app\controllers;
    use app\models\libros as libros;

    /**
     * Controlador para la gestión de libros.
     */
    class LibrosController extends Controller {

        /**
         * Constructor. Inicializa el controlador.
         */
        public function __construct(){
            parent::__construct();
        }

        /**
         * Obtiene el catálogo de libros (estático, para uso interno de otros controladores).
         * @return array Catálogo de libros
         */
        public static function getCatalog(){
            $libros = new libros();
            $result = $libros -> getCatalog();
            return $result;
        }

        /**
         * Obtiene todos los libros (estático, para uso interno de otros controladores).
         * @return array Lista de libros
         */
        public static function getAllBooks(){
            $libros = new libros();
            $result = $libros -> getAll();
            return $result;
        }

        /**
         * Endpoint API: Devuelve todos los libros en formato JSON.
         * @return void
         */
        public function getAll(){
            $libros = new libros();
            try {
                $result = $libros -> getAll();
                $this->apiResponse(true, 'Libros obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

        /**
         * Endpoint API: Devuelve el catálogo de libros en formato JSON.
         * @return void
         */
        public function getCatalogBooks(){
            $libros = new libros();
            try {
                $result = $libros -> getCatalog();
                $this->apiResponse(true, 'Libros obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

        /**
         * Endpoint API: Crea un nuevo libro a partir de los datos recibidos por POST.
         * @param mixed $params Parámetros de la petición (opcional)
         * @return void
         */
        public function createBook($params = null){
            $libros = new libros();
            try {
                $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $result = $libros -> createBook($data);
                $this->apiResponse(true, 'Libro creado correctamente', $result);
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al crear', null, $th->getMessage());
            }
        }

        /**
         * Endpoint API: Edita un libro existente con los datos recibidos por POST.
         * @param mixed $params Parámetros de la petición (opcional)
         * @return void
         */
        public function editBook( $params = null){
            $libros = new libros();
            try {
                $result = $libros->editBook(filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
                $this->apiResponse(true, 'Libro editado correctamente', $result);
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al editar', null, $th->getMessage());
            }
        }
    }