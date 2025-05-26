<?php

    namespace app\models;

    class autores extends Model {

        protected $table;
        protected $fillable = ['nombre_completo', 'nacionalidad', 'fecha_nacimiento'];

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

        public function createAutor($data){
            $this -> values = [
                $data['nombre_completo'],
                $data['nacionalidad'],
                $data['fecha_nacimiento'],
            ];
            return $this -> create();
        }

        public function editAutor($data){
            $this -> where( [['id',$data['id']]] );
            return $this -> update([
                'nombre_completo' => $data['nombre_completo'],
                'nacionalidad' => $data['nacionalidad'],
                'fecha_nacimiento' => $data['fecha_nacimiento'],
            ]);
        }
    }