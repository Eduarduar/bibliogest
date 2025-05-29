<?php

    namespace app\models;

    /**
     * Modelo para la gestión de categorías en la base de datos.
     * Permite crear, editar y obtener categorías.
     */
    class categorias extends Model {

        /**
         * Nombre de la tabla asociada al modelo.
         * @var string
         */
        protected $table;

        /**
         * Campos que pueden ser asignados masivamente.
         * @var array
         */
        protected $fillable = ['nombre', 'descripcion'];

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
         * Obtiene todas las categorías ordenadas por ID ascendente.
         * @return array Lista de categorías
         */
        public function getAll() {
            $result = $this -> select()
                            -> orderBy( [['id','asc']] )
                            -> get();
            return $result;
        }

        /**
         * Edita una categoría existente con los datos proporcionados.
         * @param array $data Datos de la categoría (incluye id)
         * @return bool Resultado de la edición
         */
        public function editCategoria($data){
            $this -> where( [['id',$data['id']]] );
            return $this -> update([
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion'],
            ]);
        }

        /**
         * Crea una nueva categoría con los datos proporcionados.
         * @param array $data Datos de la categoría
         * @return bool Resultado de la creación
         */
        public function createCategoria($data){
            $this -> values = [
                $data['nombre'],
                $data['descripcion'],
            ];
            return $this -> create();
        }
    }