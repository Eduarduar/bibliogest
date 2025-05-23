<?php

    namespace app\models;

    class prestamos_libros extends Model {

        protected $table;
        protected $fillable = ['prestamo_id', 'libro_id', 'cantidad'];

        public $values = [];

        protected $hidden = [];

        public function __construct(){
            parent::__construct();
            $this -> table = $this -> connect();
        }

        public function createPrestamoLibro($data){
            $this -> values = [
                $data['prestamo_id'],
                $data['libro_id'],
                $data['cantidad'],
            ];
            return $this -> create();
        }

    }