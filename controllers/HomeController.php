<?php 

    namespace app\controllers;
    use app\classes\Views as View;
    use app\controllers\auth\LoginController as SC;
    /**
     * Controlador para la página de inicio.
     */
    class HomeController extends Controller {

        /**
         * Constructor. Inicializa el controlador.
         */
        public function __construct(){
            parent::__construct();
        }

        /**
         * Muestra la página de inicio.
         * @param mixed $params Parámetros de la petición (opcional)
         * @return void
         */
        public function index($params = null){
            $response = [
                        'ua' => SC::sessionValidate() ?? [ 'sv' => 0 ],
                        'code'   => 200,
                        'title'  => 'BiblioGest'
                        ];
            View::render('home',$response);
        }

    }