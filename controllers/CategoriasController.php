<?php 

    namespace app\controllers;
    use app\models\categorias as categorias;

    class CategoriasController extends Controller {

        public function __construct(){
            parent::__construct();
        }

        public static function getAllCategorias(){
            $categorias = new categorias();
            $result = $categorias -> getAll();
            return $result;
        }   

        public function getAll(){
            $categorias = new categorias();
            try {
                $result = $categorias -> getAll();
                $this->apiResponse(true, 'Categorias obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

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