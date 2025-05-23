<?php 

    namespace app\controllers;
    use app\models\prestamos_libros as prestamos_libros;

    class PrestamosLibrosController extends Controller {

        public function __construct(){
            parent::__construct();
        }

        public static function createPrestamoLibro($data){
            $prestamos_libros = new prestamos_libros();
            $result = $prestamos_libros -> createPrestamoLibro($data);
            return $result;
        }
    }