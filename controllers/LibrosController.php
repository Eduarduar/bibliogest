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

        public function getCatalogBooks(){
            $libros = new libros();
            try {
                $result = $libros -> getCatalog();
                $this->apiResponse(true, 'Libros obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

    }