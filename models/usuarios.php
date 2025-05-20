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

        public function getAllUsers(){
            $result = $this -> select( ['a.id','a.nombre','a.correo','to_char(a.fecha_registro,\'DD/MM/YYYY\') as fecha_registro', 'a.rol_id','b.nombre as rol','a.activo']) 
                            -> join( "roles b","a.rol_id=b.id")
                            -> orderBy( [['a.id','asc']] )
                            -> get();
            return $result;
        }

        public function toggleUser($id, $activo){
            $result = $this -> where( [['id',$id]] )
                            -> update( ['activo' => $activo] );
            return $result;
        }

        public function editUser($data){
            $this -> where( [['id',$data['id']]] );
            return $this -> update([
                'nombre' => $data['nombre'],
                'correo' => $data['correo'],
                'rol_id' => $data['rol_id'],
            ]);
        }


    }