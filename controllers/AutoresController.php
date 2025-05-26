<?php 

    namespace app\controllers;
    use app\models\autores as autores;

    class AutoresController extends Controller {

        public function __construct(){
            parent::__construct();
        }

        public static function getAllAutores(){
            $autores = new autores();
            $result = $autores -> getAll();
            return $result;
        }   

        public function getAll(){
            $autores = new autores();
            try {   
                $result = $autores -> getAll();
                $this->apiResponse(true, 'Autores obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

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