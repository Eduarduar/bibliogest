<?php 

    namespace app\controllers;
    use app\models\prestamos as prestamos;
    use app\controllers\PrestamosLibrosController as PLC;

    /**
     * Controlador para la gestión de préstamos.
     */
    class PrestamosController extends Controller {

        /**
         * Constructor. Inicializa el controlador.
         */
        public function __construct(){
            parent::__construct();
        }

        /**
         * Obtiene todos los préstamos (estático, para uso interno de otros controladores).
         * @return array Lista de préstamos
         */
        public static function getAllPrestamos(){
            $prestamos = new prestamos();
            $result = $prestamos -> getAll();
            return $result;
        }   

        /**
         * Endpoint API: Devuelve todos los préstamos en formato JSON.
         * @return void
         */
        public function getAll(){
            $prestamos = new prestamos();
            try {
                $result = $prestamos -> getAll();
                $this->apiResponse(true, 'Prestamos obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

        /**
         * Endpoint API: Crea un nuevo préstamo y su relación con libros.
         * @param mixed $params Parámetros de la petición (opcional)
         * @return void
         */
        public function createPrestamo($params = null){
            $prestamos = new prestamos();
            try {
                $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
                $data['fecha_entrega'] = null;
                $result = $prestamos -> createPrestamo($data);
                if ($result) {
                    $plc = new PLC();
                    $plc -> createPrestamoLibro([
                        'prestamo_id' => $result['id'],
                        'libro_id' => $data['libro_id'],
                        'cantidad' => $data['cantidad'],
                    ]);
                }
                $this->apiResponse(true, 'Prestamo creado correctamente', $result);
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al crear', null, $th->getMessage());
            }
        }

        /**
         * Endpoint API: Cambia el estado de un préstamo (por ejemplo, marcar como devuelto).
         * @param mixed $params Parámetros de la petición (opcional)
         * @return void
         */
        public function togglePrestamo( $params = null){
            $prestamos = new prestamos();
            try {
                list(,,$id,$estado) = $params;
                $result = $prestamos -> togglePrestamo($id, $estado);
                $this->apiResponse(true, 'Prestamo actualizado correctamente',$result);
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al actualizar', null, $th->getMessage());
            }
        }

    }