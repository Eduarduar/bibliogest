<?php

    namespace app\models;

    class categorias extends Model {

        protected $table;
        protected $fillable = ['nombre', 'descripcion'];

        public $values = [];

        protected $hidden = [];

        public function __construct(){
            parent::__construct();
            $this -> table = $this -> connect();
        }

        public function getAll() {
            $result = $this -> select()
                            -> orderBy( [['id','asc']] )
                            -> get();
            return $result;
        }

        
        public function editCategoria($data){
            $this -> where( [['id',$data['id']]] );
            return $this -> update([
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion'],
            ]);
        }

        public function createCategoria($data){
            $this -> values = [
                $data['nombre'],
                $data['descripcion'],
            ];
            return $this -> create();
        }
    }