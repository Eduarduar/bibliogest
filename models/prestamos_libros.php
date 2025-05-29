<?php

    namespace app\models;

    /**
     * Modelo para la gestión de la relación entre préstamos y libros.
     * Permite crear registros de libros prestados en un préstamo.
     */
    class prestamos_libros extends Model {

        /**
         * Nombre de la tabla asociada al modelo.
         * @var string
         */
        protected $table;

        /**
         * Campos que pueden ser asignados masivamente.
         * @var array
         */
        protected $fillable = ['prestamo_id', 'libro_id', 'cantidad'];

        /**
         * Valores para operaciones de inserción.
         * @var array
         */
        public $values = [];

        /**
         * Campos ocultos al serializar el modelo.
         * @var array
         */
        protected $hidden = [];

        /**
         * Constructor. Inicializa la conexión y la tabla.
         */
        public function __construct(){
            parent::__construct();
            $this -> table = $this -> connect();
        }

        /**
         * Crea un nuevo registro de libro prestado en un préstamo.
         * @param array $data Datos del préstamo-libro
         * @return bool Resultado de la creación
         */
        public function createPrestamoLibro($data){
            $this -> values = [
                $data['prestamo_id'],
                $data['libro_id'],
                $data['cantidad'],
            ];
            return $this -> create();
        }

    }