<?php

    namespace app\models;

    /**
     * Modelo para la gestión de préstamos en la base de datos.
     * Permite crear, editar, obtener y cambiar el estado de préstamos.
     */
    class prestamos extends Model {

        /**
         * Nombre de la tabla asociada al modelo.
         * @var string
         */
        protected $table;

        /**
         * Campos que pueden ser asignados masivamente.
         * @var array
         */
        protected $fillable = ['usuario_id', 'fecha_prestamo', 'fecha_devolucion', 'fecha_entrega', 'estado', 'observaciones'];

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
         * Obtiene todos los préstamos con información del usuario asociado.
         * @return array Lista de préstamos
         */
        public function getAll(){
            $result = $this -> select( ['a.id','a.usuario_id', 'b.nombre as usuario_nombre','a.fecha_prestamo','a.fecha_devolucion','a.fecha_entrega','a.estado','a.observaciones']) 
                            -> join( "usuarios b","a.usuario_id=b.id")
                            -> orderBy( [['a.id','asc']] )
                            -> get();
            return $result;
        }

        /**
         * Crea un nuevo préstamo con los datos proporcionados.
         * @param array $data Datos del préstamo
         * @return bool Resultado de la creación
         */
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

        /**
         * Cambia el estado de un préstamo (por ejemplo, marcar como devuelto).
         * Si el estado es 'devuelto', actualiza la fecha de entrega.
         * @param int $id ID del préstamo
         * @param string $estado Nuevo estado
         * @return bool Resultado de la actualización
         */
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