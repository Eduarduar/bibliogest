<?php

    namespace app\models;

    /**
     * Modelo para la gestión de usuarios en la base de datos.
     * Permite crear, editar, obtener y activar/desactivar usuarios.
     */
    class usuarios extends Model {

        /**
         * Nombre de la tabla asociada al modelo.
         * @var string
         */
        protected $table;

        /**
         * Campos que pueden ser asignados masivamente.
         * @var array
         */
        protected $fillable = [
            'nombre',
            'correo',
            'contrasena',
            'rol_id',
            'activo'
        ];

        /**
         * Campos ocultos al serializar el modelo.
         * @var array
         */
        protected $hidden = [
            'contrasena'
        ];

        /**
         * Valores para operaciones de inserción.
         * @var array
         */
        public $values = [];

        /**
         * Constructor. Inicializa la conexión y la tabla.
         */
        public function __construct(){
            parent::__construct();
            $this -> table = $this -> connect();
        }

        /**
         * Crea un nuevo usuario con los datos proporcionados.
         * La contraseña se almacena de forma segura.
         * @param array $data Datos del usuario
         * @return bool Resultado de la creación
         */
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

        /**
         * Obtiene todos los usuarios con información de su rol.
         * @return array Lista de usuarios
         */
        public function getAllUsers(){
            $result = $this -> select( ['a.id','a.nombre','a.correo','to_char(a.fecha_registro,\'DD/MM/YYYY\') as fecha_registro', 'a.rol_id','b.nombre as rol','a.activo']) 
                            -> join( "roles b","a.rol_id=b.id")
                            -> orderBy( [['a.id','asc']] )
                            -> get();
            return $result;
        }

        /**
         * Cambia el estado de un usuario (activo/inactivo).
         * @param int $id ID del usuario
         * @param int $activo Estado (1: activo, 0: inactivo)
         * @return bool Resultado de la actualización
         */
        public function toggleUser($id, $activo){
            $result = $this -> where( [['id',$id]] )
                            -> update( ['activo' => $activo] );
            return $result;
        }

        /**
         * Edita un usuario existente con los datos proporcionados.
         * @param array $data Datos del usuario (incluye id)
         * @return bool Resultado de la edición
         */
        public function editUser($data){
            $this -> where( [['id',$data['id']]] );
            return $this -> update([
                'nombre' => $data['nombre'],
                'correo' => $data['correo'],
                'rol_id' => $data['rol_id'],
            ]);
        }

        /**
         * Obtiene un catálogo reducido de usuarios activos.
         * @return array Catálogo de usuarios
         */
        public function getCatalogUsers(){
            $result = $this -> select( ['id','nombre','correo']) 
                            -> orderBy( [['id','asc']] )
                            -> get();
            return $result;
        }

    }