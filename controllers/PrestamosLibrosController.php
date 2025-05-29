<?php 

    namespace app\controllers;
    use app\models\prestamos_libros as prestamos_libros;

    /**
     * Controlador para la gestión de la relación préstamo-libro.
     */
    class PrestamosLibrosController extends Controller {

        /**
         * Constructor. Inicializa el controlador.
         */
        public function __construct(){
            parent::__construct();
        }

        /**
         * Crea la relación entre un préstamo y un libro.
         * @param array $data Datos de la relación préstamo-libro
         * @return bool Resultado de la creación
         */
        public static function createPrestamoLibro($data){
            $prestamos_libros = new prestamos_libros();
            $result = $prestamos_libros -> createPrestamoLibro($data);
            return $result;
        }
    }