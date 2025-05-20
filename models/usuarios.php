<?php

    namespace app\models;

    class usuarios extends Model {

        protected $table;
        protected $fillable = [
            'nombre',
            'correo',
            'contrasena',
            'rol_id',
            'activo'
        ];

        protected $hidden = [
            'contrasena'
        ];

        public $values = [];

        public function __construct(){
            parent::__construct();
            $this -> table = $this -> connect();
        }

        public function newUser($data) {
            $this -> values = [
                $data['nombre'],
                $data['correo'],
                password_hash($data['contrasena'], PASSWORD_DEFAULT),
                $data['rol_id'],
                1,
            ];
            return $this -> create();
        }

    }