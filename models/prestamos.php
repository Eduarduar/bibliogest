<?php

    namespace app\models;

    class prestamos extends Model {

        protected $table;
        protected $fillable = ['usuario_id', 'fecha_prestamo', 'fecha_devolucion', 'fecha_entrega', 'estado', 'observaciones'];

        public $values = [];

        protected $hidden = [];

        public function __construct(){
            parent::__construct();
            $this -> table = $this -> connect();
        }

        public function getAll(){
            $result = $this -> select( ['a.id','a.usuario_id', 'b.nombre as usuario_nombre','a.fecha_prestamo','a.fecha_devolucion','a.fecha_entrega','a.estado','a.observaciones']) 
                            -> join( "usuarios b","a.usuario_id=b.id")
                            -> orderBy( [['a.id','asc']] )
                            -> get();
            return $result;
        }

        public function createPrestamo($data){
            $this -> values = [
                $data['usuario_id'],
                $data['fecha_prestamo'],
                $data['fecha_devolucion'],
                $data['fecha_entrega'],
                'activo',
                'ninguna',
            ];
            return $this -> create();
        }

        public function togglePrestamo($id, $estado){
            $now = date('Y-m-d');

            $data = ['estado' => $estado];

            if ($estado == 'devuelto') {
                $data['fecha_entrega'] = $now;
            }

            $result = $this -> where( [['id',$id]] )
                            -> update( $data );
            return $result;
        }

    }