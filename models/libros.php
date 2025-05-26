<?php

    namespace app\models;

    class libros extends Model {

        protected $table;
        protected $fillable = ['titulo', 'autor_id', 'categoria_id', 'isbn', 'editorial', 'anio_publicacion', 'cantidad_total', 'cantidad_disponible', 'descripcion'];

        public $values = [];

        protected $hidden = [];

        public function __construct(){
            parent::__construct();
            $this -> table = $this -> connect();
        }

        public function getAll() {
            $result = $this -> select(['a.id','a.titulo', 'a.autor_id', 'a.categoria_id', 'a.isbn', 'a.editorial', 'a.anio_publicacion', 'a.cantidad_total', 'a.cantidad_disponible', 'a.descripcion', 'b.nombre_completo as autor', 'c.nombre as categoria'])
                            -> join( "autores b","a.autor_id=b.id")
                            -> join( "categorias c","a.categoria_id=c.id")
                            -> orderBy( [['a.id','asc']] )
                            -> get();
            return $result;
        }

        public function getCatalog(){
            $result = $this -> select( ['a.id','a.titulo','b.nombre_completo as autor'])
                            -> join( "autores b","a.autor_id=b.id")
                            -> orderBy( [['a.id','asc']] )
                            -> get();
            return $result;
        }

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