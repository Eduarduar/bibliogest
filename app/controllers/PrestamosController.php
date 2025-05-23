<?php 

    namespace app\controllers;
    use app\models\prestamos as prestamos;
    use app\controllers\PrestamosLibrosController as PLC;

    class PrestamosController extends Controller {

        public function __construct(){
            parent::__construct();
        }

        public static function getAllPrestamos(){
            $prestamos = new prestamos();
            $result = $prestamos -> getAll();
            return $result;
        }   

        public function getAll(){
            $prestamos = new prestamos();
            try {
                $result = $prestamos -> getAll();
                $this->apiResponse(true, 'Prestamos obtenidos correctamente', json_decode($result));
            } catch (\Throwable $th) {
                $this->apiResponse(false, 'Error al obtener', null, $th->getMessage());
            }
        }

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