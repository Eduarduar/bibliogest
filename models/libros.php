<?php

    namespace app\models;

    /**
     * Modelo para la gestión de libros en la base de datos.
     * Permite crear, editar, obtener libros y consultar el catálogo.
     */
    class libros extends Model {

        /**
         * Nombre de la tabla asociada al modelo.
         * @var string
         */
        protected $table;

        /**
         * Campos que pueden ser asignados masivamente.
         * @var array
         */
        protected $fillable = ['titulo', 'autor_id', 'categoria_id', 'isbn', 'editorial', 'anio_publicacion', 'cantidad_total', 'cantidad_disponible', 'descripcion'];

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
         * Obtiene todos los libros con información de autor y categoría.
         * @return array Lista de libros
         */
        public function getAll() {
            $result = $this -> select(['a.id','a.titulo', 'a.autor_id', 'a.categoria_id', 'a.isbn', 'a.editorial', 'a.anio_publicacion', 'a.cantidad_total', 'a.cantidad_disponible', 'a.descripcion', 'b.nombre_completo as autor', 'c.nombre as categoria'])
                            -> join( "autores b","a.autor_id=b.id")
                            -> join( "categorias c","a.categoria_id=c.id")
                            -> orderBy( [['a.id','asc']] )
                            -> get();
            return $result;
        }

        /**
         * Obtiene un catálogo reducido de libros (id, título y autor).
         * @return array Catálogo de libros
         */
        public function getCatalog(){
            $result = $this -> select( ['a.id','a.titulo','b.nombre_completo as autor'])
                            -> join( "autores b","a.autor_id=b.id")
                            -> orderBy( [['a.id','asc']] )
                            -> get();
            return $result;
        }

        /**
         * Edita un libro existente con los datos proporcionados.
         * @param array $data Datos del libro (incluye id)
         * @return bool Resultado de la edición
         */
        public function editBook($data){
            $this -> where( [['id',$data['id']]] );
            return $this -> update([
                'titulo' => $data['titulo'],
                'autor_id' => $data['autor_id'],
                'categoria_id' => $data['categoria_id'],
                'isbn' => $data['isbn'],
                'editorial' => $data['editorial'],
                'anio_publicacion' => $data['anio_publicacion'],
                'cantidad_total' => $data['cantidad_total'],
                'cantidad_disponible' => $data['cantidad_disponible'],
                'descripcion' => $data['descripcion'],
            ]);
        }

        /**
         * Crea un nuevo libro con los datos proporcionados.
         * @param array $data Datos del libro
         * @return bool Resultado de la creación
         */
        public function createBook($data){
            $this -> values = [
                $data['titulo'],
                $data['autor_id'],
                $data['categoria_id'],
                $data['isbn'],
                $data['editorial'],
                $data['anio_publicacion'],
                $data['cantidad_total'],
                $data['cantidad_disponible'],
                $data['descripcion']
            ];
            return $this -> create();
        }

    }