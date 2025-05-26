<?php 

    namespace app\controllers;
    use app\models\libros as libros;

    class LibrosController extends Controller {

        public function __construct(){
            parent::__construct();
        }

        public static function getCatalog(){
            $libros = new libros();
            $result = $libros -> getCatalog();
            return $result;
        }

        public static function getAllBooks(){
            $libros = new libros();
            $result = $libros -> getAll();
            return $result;
        }

        public function getAll(){
            $libros = new libros();
            try {
                $result = $libros -> getAll();
                $this->apiResponse(true, 'Libros obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

        public function getCatalogBooks(){
            $libros = new libros();
            try {
                $result = $libros -> getCatalog();
                $this->apiResponse(true, 'Libros obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

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