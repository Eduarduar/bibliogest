<?php

    namespace app\models;

    class libros extends Model {

        protected $table;
        protected $fillable = ['titulo', 'autor_id', 'categoria_id', 'isbn', 'editorial', 'anio_publicacion', 'cantidad_total', 'cantidad_disponible', 'descripcion', 'imagen_url', 'fecha_registro'];

        public $values = [];

        protected $hidden = [];

        public function __construct(){
            parent::__construct();
            $this -> table = $this -> connect();
        }

        public function getCatalog(){
            $result = $this -> select( ['a.id','a.titulo','b.nombre_completo as autor'])
                            -> join( "autores b","a.autor_id=b.id")
                            -> orderBy( [['a.id','asc']] )
                            -> get();
            return $result;
        }

    }