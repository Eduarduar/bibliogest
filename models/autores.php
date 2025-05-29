<?php

    namespace app\models;

    /**
     * Modelo para la gestión de autores en la base de datos.
     * Permite crear, editar y obtener autores.
     */
    class autores extends Model {

        /**
         * Nombre de la tabla asociada al modelo.
         * @var string
         */
        protected $table;

        /**
         * Campos que pueden ser asignados masivamente.
         * @var array
         */
        protected $fillable = ['nombre_completo', 'nacionalidad', 'fecha_nacimiento'];

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
         * Obtiene todos los autores ordenados por ID ascendente.
         * @return array Lista de autores
         */
        public function getAll() {
            $result = $this -> select()
                            -> orderBy( [['id','asc']] )
                            -> get();
            return $result;
        }

        /**
         * Crea un nuevo autor con los datos proporcionados.
         * @param array $data Datos del autor
         * @return bool Resultado de la creación
         */
        public function createAutor($data){
            $this -> values = [
                $data['nombre_completo'],
                $data['nacionalidad'],
                $data['fecha_nacimiento'],
            ];
            return $this -> create();
        }

        /**
         * Edita un autor existente con los datos proporcionados.
         * @param array $data Datos del autor (incluye id)
         * @return bool Resultado de la edición
         */
        public function editAutor($data){
            $this -> where( [['id',$data['id']]] );
            return $this -> update([
                'nombre_completo' => $data['nombre_completo'],
                'nacionalidad' => $data['nacionalidad'],
                'fecha_nacimiento' => $data['fecha_nacimiento'],
            ]);
        }
    }