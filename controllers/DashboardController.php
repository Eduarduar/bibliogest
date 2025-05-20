<?php 

    namespace app\controllers;
    use app\classes\Views as View;
    use app\controllers\auth\LoginController as SC;
    class DashboardController extends Controller {

        public function __construct(){
            parent::__construct();
        }

        public function validateSession(){
            $ua = SC::sessionValidate() ?? [ 'sv' => 0 ];
            if($ua['sv'] == 0){
                SC::logout();
            }
            return $ua;
        }

        public function index($params = null){
            $response = [
                        'ua' => $this -> validateSession(),
                        'code'   => 200,
                        'title'  => 'BiblioGest'
                        ];
            View::render('Dashboard/dasboard',$response);
        }

        public function libros($params = null){
            $response = [
                        'ua' => $this -> validateSession(),
                        'code'   => 200,
                        'title'  => 'BiblioGest'
                        ];
            View::render('Dashboard/libros',$response);
        }

        public function usuarios($params = null){
            $response = [
                        'ua' => $this -> validateSession(),
                        'code'   => 200,
                        'title'  => 'BiblioGest'
                        ];
            View::render('Dashboard/usuarios',$response);
        }

        public function prestamos($params = null){
            $response = [
                        'ua' => $this -> validateSession(),
                        'code'   => 200,
                        'title'  => 'BiblioGest'
                        ];
            View::render('Dashboard/prestamos',$response);
        }

        public function reportes($params = null){
            $response = [
                        'ua' => $this -> validateSession(),
                        'code'   => 200,
                        'title'  => 'BiblioGest'
                        ];
            View::render('Dashboard/reportes',$response);
        }

    }